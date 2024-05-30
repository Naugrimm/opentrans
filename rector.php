<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;
use Rector\Symfony\Set\JMSSetList;
use Utils\Rector\Rector\NodeInterfaceAddHasSerializableAttributesTraitRector;
use Utils\Rector\Rector\NodeInterfaceConstructorCallToNodeBuilderFromArrayRector;
use Utils\Rector\Rector\NodeInterfaceDocBlocKTypeHintsToTypedPropertyRector;
use Utils\Rector\Rector\NodeInterfaceRemoveSimpleGettersRector;
use Utils\Rector\Rector\NodeInterfaceRemoveSimpleSettersRector;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
    // uncomment to reach your current PHP version
    ->withSets([
        JMSSetList::ANNOTATIONS_TO_ATTRIBUTES,
        SetList::TYPE_DECLARATION,
        SetList::CODE_QUALITY,
        SetList::CODING_STYLE,
    ])
    ->withPhpSets()
    ->withRules([
        NodeInterfaceDocBlocKTypeHintsToTypedPropertyRector::class,
        NodeInterfaceConstructorCallToNodeBuilderFromArrayRector::class,
        NodeInterfaceAddHasSerializableAttributesTraitRector::class,
        NodeInterfaceRemoveSimpleGettersRector::class,
        NodeInterfaceRemoveSimpleSettersRector::class,
    ])
    ;
