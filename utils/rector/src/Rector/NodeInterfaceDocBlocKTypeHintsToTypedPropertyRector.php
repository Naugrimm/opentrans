<?php

declare(strict_types=1);

namespace Utils\Rector\Rector;

use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;
use PHPStan\PhpDocParser\Ast\Node as DocNode;
use PHPStan\PhpDocParser\Ast\PhpDoc\GenericTagValueNode;
use PHPStan\PhpDocParser\Ast\PhpDoc\PhpDocTagNode;
use PHPStan\PhpDocParser\Ast\PhpDoc\VarTagValueNode;
use PHPStan\PhpDocParser\Ast\Type\IntersectionTypeNode;
use Rector\BetterPhpDocParser\PhpDocInfo\PhpDocInfo;
use Rector\BetterPhpDocParser\PhpDocInfo\PhpDocInfoFactory;
use Rector\BetterPhpDocParser\ValueObject\Type\FullyQualifiedIdentifierTypeNode;
use Rector\PhpDocParser\PhpDocParser\PhpDocNodeTraverser;
use Rector\Rector\AbstractRector;
use PHPStan\Type\ObjectType;
use PHPStan\Type\ArrayType;
use PHPStan\Type\Type;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Utils\Rector\Tests\Rector\NodeInterfaceDocBlocKTypeHintsToTypedPropertyRector\NodeInterfaceDocBlocKTypeHintsToTypedPropertyRectorTest
 */
final class NodeInterfaceDocBlocKTypeHintsToTypedPropertyRector extends AbstractRector
{
    public function __construct(private PhpDocInfoFactory $phpDocInfoFactory)
    {
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition('converts docblock type annotations of NodeInterface classes to native PHP types', [
            new CodeSample(
                <<<'CODE_SAMPLE'
class Account implements NodeInterface
{
    /**
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('HOLDER')]
    #[Serializer\Type('string')]
    protected $holder;
}
CODE_SAMPLE
                ,
                <<<'CODE_SAMPLE'
class Account implements NodeInterface
{
    /**
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('HOLDER')]
    #[Serializer\Type('string')]
    protected string $holder;
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
        return [Class_::class];
    }

    /**
     * @param \PhpParser\Node\Stmt\Class_ $node
     */
    public function refactor(Node $node): ?Node
    {
        if (!in_array(NodeInterface::class, $node->implements)) {
            return null;
        }

        foreach ($node->getProperties() as $property) {
            if ($property->type !== null) {
                continue;
            }

            if ($property->isPublic()) {
                continue;
            }

            foreach ($property->attrGroups as $attrGroup) {
                foreach ($attrGroup->attrs as $attr) {
                    if ($attr->name->toCodeString() === "\\".\JMS\Serializer\Annotation\Type::class) {
                        $value = $attr->args[0]->value;
                        if ($value instanceof Node\Expr\ClassConstFetch && $value->name->name === 'class') {
                            $property->type = new Node\Name\FullyQualified($value->class);
                        } elseif ($value instanceof Node\Scalar\String_) {
                            if (str_starts_with($value->value, 'array')) {
                                $property->type = new Node\Name('array');
                            } else {
                                $property->type = new Node\Name($value->value);
                            }
                        }
                    }
                }
            }
        }

        return $node;
    }
}
