<?php

namespace Naugrim\OpenTrans\Nodes;

use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

interface UdxInterface extends NodeInterface
{
    public function getVendor(): string;
    public function getName(): string;
    public function getValue(): string;
}
