<?php

declare(strict_types=1);

namespace Utils\Rector\Rector;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlElement;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\OpenTrans;
use PhpParser\Node;
use Rector\PhpAttribute\NodeFactory\NamedArgsFactory;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Utils\Rector\Tests\Rector\SerializedNameWithBmePrefixToBmecatNamespaceRector\SerializedNameWithBmePrefixToBmecatNamespaceRectorTest
 */
final class SerializedNameWithBmePrefixToBmecatNamespaceRector extends AbstractRector
{
    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition('converts prefixed bmecat elements to the correct namespace', [
            new CodeSample(
                <<<'CODE_SAMPLE'
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\PartyId;

class Party implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type(PartyId::class)]
    #[Serializer\SerializedName('bme:PARTY_ID')]
    protected PartyId $id;
}
CODE_SAMPLE
                ,
                <<<'CODE_SAMPLE'
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\PartyId;
use Naugrim\OpenTrans\OpenTrans;

class Party implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type(PartyId::class)]
    #[Serializer\SerializedName('PARTY_ID')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected PartyId $id;
}
CODE_SAMPLE
            ),
        ]);
    }

    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes(): array
    {
        // @todo select node type
        return [\PhpParser\Node\Stmt\Class_::class];
    }

    /**
     * @param \PhpParser\Node\Stmt\Class_ $node
     */
    public function refactor(Node $node): ?Node
    {
        if (!in_array(NodeInterface::class, $node->implements)) {
            return $node;
        }

        foreach ($node->getProperties() as $property) {
            $xmlElementAttribute = null;
            foreach ($property->attrGroups as $attrGroup) {
                foreach ($attrGroup->attrs as $attr) {
                    if ($this->getName($attr) === XmlElement::class) {
                        $xmlElementAttribute = $attr;
                        break;
                    }
                }
            }

            foreach ($property->attrGroups as $attrGroup) {
                foreach ($attrGroup->attrs as $attr) {
                    if ($this->getName($attr) !== SerializedName::class) {
                        continue;
                    }
                    if (! $attr->args[0]->value instanceof Node\Scalar\String_) {
                        continue;
                    }

                    if (! str_starts_with($attr->args[0]->value->value, 'bme:')) {
                        continue;
                    }

                    $attr->args[0]->value->value = str_replace('bme:', '', $attr->args[0]->value->value);

                    if ($xmlElementAttribute instanceof Node\Attribute) {
                        $namespaceArg = array_filter(
                            $xmlElementAttribute->args,
                            fn (Node\Arg $arg) => $this->getName($arg) === 'namespace'
                        );
                        if (count($namespaceArg) === 1) {
                            continue;
                        }
                        $xmlElementAttribute->args[] = new Node\Arg(
                            value: new Node\Expr\ClassConstFetch(new Node\Name\FullyQualified(OpenTrans::class), 'BMECAT_NAMESPACE'),
                            name: new Node\Identifier('namespace'),
                        );
                    } else {
                        $newAttribute = new Node\Attribute(
                            new Node\Name\FullyQualified(XmlElement::class),
                            [
                                new Node\Arg(
                                    value: new Node\Expr\ClassConstFetch(new Node\Name\FullyQualified(OpenTrans::class), 'BMECAT_NAMESPACE'),
                                    name: new Node\Identifier('namespace'),
                                )
                            ]
                        );
                        $property->attrGroups[] = new Node\AttributeGroup(
                            [$newAttribute]
                        );
                    }
                }
            }
        }

        return $node;
    }
}
