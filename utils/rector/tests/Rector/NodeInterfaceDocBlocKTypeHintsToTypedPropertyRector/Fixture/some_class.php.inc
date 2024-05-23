<?php

namespace Utils\Rector\Tests\Rector\NodeInterfaceDocBlocKTypeHintsToTypedPropertyRector\Fixture;

use JMS\Serializer\Annotation\Type;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Invoice\Header;

class Account implements NodeInterface
{
    #[Type('string')]
    protected $test1;

    #[Type('array<int>')]
    protected $test2;

    #[Type(Header::class)]
    protected $test3;
}

?>
-----
<?php

namespace Utils\Rector\Tests\Rector\NodeInterfaceDocBlocKTypeHintsToTypedPropertyRector\Fixture;

use JMS\Serializer\Annotation\Type;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Invoice\Header;

class Account implements NodeInterface
{
    #[Type('string')]
    protected string $test1;

    #[Type('array<int>')]
    protected array $test2;

    #[Type(Header::class)]
    protected \Naugrim\OpenTrans\Nodes\Invoice\Header $test3;
}

?>
