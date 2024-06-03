<?php

namespace Naugrim\OpenTrans\Tests\Nodes\Concerns;

use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\OpenTrans\Tests\Nodes\NodeWithContentType;
use PHPUnit\Framework\TestCase;

class HasContentTypeAttributeTest extends TestCase
{
    public function testSetGetContentType(): void
    {
        $contentType = 'image/jpg';
        $node = NodeBuilder::fromArray([], NodeWithContentType::class);
        $node->setContentType($contentType);
        $this->assertEquals($contentType, $node->getContentType());
    }
}
