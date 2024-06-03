<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;
use Rector\Symfony\Set\JMSSetList;
use Utils\Rector\Rector\NodeInterfaceDocBlocKTypeHintsToTypedPropertyRector;

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
    ])
    ;
