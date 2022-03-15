<?php

namespace Naugrim\OpenTrans\Nodes\Invoice;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalAmount;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalItemNum;
use Naugrim\OpenTrans\Nodes\Tax\DetailsFix;

/**
 * @Serializer\AccessorOrder("custom", custom = {"totalItemNum", "netValueGoods", "netValueExtra", "totalAmount", "allowOrChargesFix", "totalTax"})
 */
class Summary implements NodeInterface
{
    use HasTotalItemNum, HasTotalAmount;

    /**
     *
     * @Serializer\Expose
     * @Serializer\SerializedName("NET_VALUE_GOODS")
     * @Serializer\Type("float")
     *
     * @var float
     */
    protected $netValueGoods;
    /**
     *
     * @Serializer\Expose
     * @Serializer\SerializedName("TOTAL_TAX")
     * @Serializer\Type("array<Naugrim\OpenTrans\Nodes\Tax\DetailsFix>")
     * @Serializer\XmlList(entry = "TAX_DETAILS_FIX")
     *
     * @var DetailsFix[]
     */
    protected $totalTax = [];

    /**
     * @return float
     */
    public function getNetValueGoods(): float
    {
        return $this->netValueGoods;
    }

    /**
     * @param float $netValueGoods
     * @return Summary
     */
    public function setNetValueGoods(float $netValueGoods): Summary
    {
        $this->netValueGoods = $netValueGoods;
        return $this;
    }

    /**
     * @return DetailsFix[]
     */
    public function getTotalTax(): array
    {
        return $this->totalTax;
    }

    /**
     * @param DetailsFix[] $taxes
     * @return Summary
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setTotalTax(array $taxes): Summary
    {
        foreach ($taxes as $tax) {
            if (!$tax instanceof DetailsFix) {
                $tax = NodeBuilder::fromArray($tax, new DetailsFix());
            }
            $this->addTotalTax($tax);
        }
        return $this;
    }

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
