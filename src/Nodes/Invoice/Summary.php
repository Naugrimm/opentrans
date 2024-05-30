<?php

namespace Naugrim\OpenTrans\Nodes\Invoice;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalAmount;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalItemNum;
use Naugrim\OpenTrans\Nodes\Tax\DetailsFix;

/**
 * @implements NodeInterface<Summary>
 */
#[Serializer\AccessorOrder(order: 'custom', custom: ['totalItemNum', 'netValueGoods', 'netValueExtra', 'totalAmount', 'allowOrChargesFix', 'totalTax'])]
class Summary implements NodeInterface
{
    use HasSerializableAttributes;
    use HasTotalItemNum;
    use HasTotalAmount;

    /**
     *
     *
     * @var float
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('NET_VALUE_GOODS')]
    #[Serializer\Type('float')]
    protected float $netValueGoods;

    /**
     *
     *
     * @var DetailsFix[]
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('TOTAL_TAX')]
    #[Serializer\Type('array<Naugrim\OpenTrans\Nodes\Tax\DetailsFix>')]
    #[Serializer\XmlList(entry: 'TAX_DETAILS_FIX')]
    protected array $totalTax = [];

    /**
     * @param DetailsFix $tax
     * @return $this
     */
    public function addTotalTax(DetailsFix $tax): Summary
    {
        $this->totalTax[] = $tax;
        return $this;
    }
}
