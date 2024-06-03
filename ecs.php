<?php

declare(strict_types=1);

use PHP_CodeSniffer\Standards\Generic\Sniffs\CodeAnalysis\AssignmentInConditionSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\Formatting\SpaceAfterNotSniff;
use PhpCsFixer\Fixer\ClassNotation\ClassAttributesSeparationFixer;
use PhpCsFixer\Fixer\ClassNotation\OrderedClassElementsFixer;
use PhpCsFixer\Fixer\Comment\NoEmptyCommentFixer;
use PhpCsFixer\Fixer\Operator\UnaryOperatorSpacesFixer;
use PhpCsFixer\Fixer\Phpdoc\NoSuperfluousPhpdocTagsFixer;
use PhpCsFixer\Fixer\Whitespace\NoExtraBlankLinesFixer;
use Symplify\CodingStandard\Fixer\LineLength\LineLengthFixer;
use Symplify\CodingStandard\Fixer\Spacing\MethodChainingNewlineFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return ECSConfig::configure()
    ->withPaths([__DIR__ . '/src'])
    ->withRules([
        SpaceAfterNotSniff::class,
        NoSuperfluousPhpdocTagsFixer::class,
        NoEmptyCommentFixer::class,
        NoExtraBlankLinesFixer::class,
    ])
    ->withPreparedSets(psr12: true, symplify: true, arrays: true, cleanCode: true)
    ->withSkip([
        AssignmentInConditionSniff::class,
        ClassAttributesSeparationFixer::class,
        OrderedClassElementsFixer::class,
        MethodChainingNewlineFixer::class,
        LineLengthFixer::class,
        UnaryOperatorSpacesFixer::class
    ]);
