<?php

namespace Naugrim\OpenTrans\Nodes\Payment;

use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasStringValue;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;

/**
 * Payment terms are aligned to UN/EDIFACT 4279 (Payment terms type code qualifier)
 * https://web.archive.org/web/20150418213750/http://www.unece.org/trade/untdid/d00b/tred/tred4279.htm
 * -
 * @implements NodeInterface<PaymentTerm>
 * @method self setType(string $type)
 * @method string getType()
 * @method self setValue(string $value)
 * @method string getValue()
 */
class PaymentTerm implements NodeInterface
{
    use HasSerializableAttributes;
    /**
     * @use HasTypeAttribute<self>
     */
    use HasTypeAttribute;
    use HasStringValue;

    /** Payment conditions normally applied. */
    public const string BASIC = '1';

    /** Self-explanatory. */
    public const string END_OF_MONTH = '2';

    /** Self-explanatory. */
    public const string FIXED_DATE = '3';

    /** Self-explanatory. */
    public const string DEFERRED = '4';

    /** Self-explanatory. */
    public const string DISCOUNT_NOT_APPLICABLE = '5';

    /** Different payment terms negotiated under a documentary credit. */
    public const string MIXED = '6';

    /** Self-explanatory. */
    public const string EXTENDED = '7';

    /** Self-explanatory. */
    public const string BASIC_DISCOUNT_OFFERED = '8';

    /** Occurring in the next month after present. */
    public const string PROXIMO = '9';

    /** Payment is due on receipt of invoice. */
    public const string INSTANT = '10';

    /** Payment terms to be chosen by buyer (from options separately advised). */
    public const string ELECTIVE = '11';

    /** Payment due ten days after end of a calendar month. */
    public const string TEN_DAYS_AFTER_END_OF_MONTH = '12';

    /** Seller will advise buyer of payment terms by separate transaction. */
    public const string SELLER_TO_DVISE_BUYER = '13';

    /** Self-explanatory. */
    public const string PAID_AGAINST_STATEMENT = '14';

    /** Self-explanatory. */
    public const string NO_CHARGE = '15';

    /** Self-explanatory. */
    public const string NOT_YET_DEFINED = '16';

    /** Payment is due the end of the current or specified month. */
    public const string ULTIMO = '17';

    /** Self-explanatory. */
    public const string PREVIOUSLY_AGREED_UPON = '18';

    /** The payment terms require the use of United States funds. */
    public const string UNITED_STATES_FUNDS = '19';

    /** Self-explanatory. */
    public const string PENALTY_TERMS = '20';

    /** Self-explanatory. */
    public const string PAYMENT_BY_INSTALMENT = '21';

    /** Self-explanatory. */
    public const string DISCOUNT = '22';

    /** Payment made at sight. */
    public const string AVAILABLE_BY_SIGHT_PAYMENT = '23';

    /** Payment made at deferred date. */
    public const string AVAILABLE_BY_DEFERRED_PAYMENT = '24';

    /** Payment on acceptance. */
    public const string AVAILABLE_BY_ACCEPTANCE = '25';

    /** Payment made by negotiation with any bank. */
    public const string AVAILABLE_BY_NEGOTIATION_WITH_ANY_BANK = '26';

    /** Payment made by negotiation with any bank in a specified location. */
    public const string AVAILABLE_BY_NEGOTIATION_WITH_ANY_BANK_IN = '27';

    /** Payment made by negotiation with a specified financial institution. */
    public const string AVAILABLE_BY_NEGOTIATION_BY_NAMED_BANK = '28';

    /** Payment made by negotiation. */
    public const string AVAILABLE_BY_NEGOTIATION = '29';

    /** Payment adjusted for outstanding credits or debits. */
    public const string ADJUSTMENT_PAYMENT = '30';

    /** Payment after due date. */
    public const string LATE_PAYMENT = '31';

    /** Payment in advance of due date. */
    public const string ADVANCED_PAYMENT = '32';

    /** Payment by instalments according to progress (as agreed). */
    public const string PAYMENT_BY_INSTALMENTS_ACCORDING_TO_PROGRESS_AS_AGREED = '33';

    /** Payment by instalments according to progress (to be agreed). */
    public const string PAYMENT_BY_INSTALMENTS_ACCORDING_TO_PROGRESS_TO_BE_AGREED = '34';

    /** Terms of payment differ from the normal terms. */
    public const string NONSTANDARD = '35';

    /** Payment to be made according to bilaterally agreed conditions between buyer and seller. */
    public const string TENOR_PAYMENT_TERMS = '36';

    /** Payment must be made for complete value and may not be paid in instalments. */
    public const string COMPLETE_PAYMENT = '37';

    /** Payment terms are specified in a consolidated invoice. */
    public const string PAYMENT_TERMS_DEFINED_IN_CONSOLIDATED_INVOICE = '38';

    /** The payment terms require payment upon completion. */
    public const string PAYMENT_UPON_COMPLETION = '39';

    /** The payment terms require a partial payment in advance of completion. */
    public const string PARTIAL_ADVANCE = '40';

    /** The payment terms are that the goods will be paid for when they are sold or consumed. */
    public const string CONSIGNMENT = '41';

    /** The payment terms involve the use of an inter-company account. */
    public const string INTER_COMPANY_ACCOUNT = '42';

    /** The payment terms involve a debtor who promises to pay a definite sum of money on demand or at a definite time in the future. */
    public const string SELL_BY_NOTE = '43';

    /** The payment terms involve payment for merchandise owned by a third party. */
    public const string SUPPLIER_FLOOR_PLAN = '44';

    /** The payment terms are based on a contract with a vendor. */
    public const string CONTRACT_BASIS = '45';

    /** The payment terms involve the monitoring of credit by the grantor. */
    public const string CREDIT_CONTROLLED = '46';

    /** The payment terms in which suppliers may extend seasonal dating. */
    public const string DATING_GIVEN = '47';

    /** A trade acceptance is a written acknowledgement of the sale of goods and promise to pay at a definite date and place. */
    public const string TRADE_ACCEPTANCE = '48';

    /** The payment terms permit reimbursement of costs plus other authorised changes. */
    public const string COST_PLUS = '49';

    /** The payment terms require the use of a letter of credit. */
    public const string LETTER_OF_CREDIT = '50';

    /** The payment terms are included in the lease agreement. */
    public const string LEASE_AGREEMENT = '51';

    /** The payment terms are cash is due on delivery of  merchandise. */
    public const string CASH_ON_DELIVERY = '52';

    /** The payment terms are dictated by state law requiring payment of cash. */
    public const string CASH_BY_STATE_LAW = '53';

    /** The payment terms require the use of bank transfer. */
    public const string BANK_TRANSFER = '54';

    /** The payment terms require payment by cash on arrival of the goods or services. */
    public const string CASH_ON_ARRIVAL = '55';

    /** The payment terms are that payments are made in cash. */
    public const string CASH = '56';

    /** The payment terms are that a discount is applicable if the payment is made in cash. */
    public const string CASH_DISCOUNT_TERMS_APPLY = '57';

    /** The payment terms require the payment in cash with placement of the order. */
    public const string CASH_WITH_ORDER = '58';

    /** The payment terms involve a vendor request for payment by cash. */
    public const string CASH_PER_VENDOR_REQUEST = '59';

    /** The payment terms require the use of an irrevocable letter of credit. */
    public const string IRREVOCABLE_LETTER_OF_CREDIT = '60';

    /** The payment terms require acceptance of liability before document transfer. */
    public const string DOCUMENTS_AGAINST_ACCEPTANCE = '61';

    /** The payment terms permit the use of a charge card to effect payment. */
    public const string CHARGE_CARD = '62';

    /** The payment terms require payment before document transfer. */
    public const string DOCUMENTS_AGAINST_PAYMENT = '63';

    /** The payment terms are based on the time allowed by commercial usage for the payment of foreign bills of exchange. */
    public const string USANCE_BILL = '64';

    /** The payment terms require the presentation of a letter of credit. */
    public const string LETTER_OF_CREDIT_AT_SIGHT = '65';

    /** The payment terms call for the use of a secured account. */
    public const string SECURED_ACCOUNT = '66';

    /** The payment terms call for the use of basic commission terms. */
    public const string BASIC_COMMISSION_TERMS = '67';

    /** The payment terms require a deposit be provided. */
    public const string DEPOSIT_REQUIRED = '68';

    /** The payment terms include a discount when payment is made within a time frame designated as prompt pay. */
    public const string DISCOUNT_WITH_PROMPT_PAY = '69';

    /** The payment terms include a discount when payment is made in advance. */
    public const string DISCOUNT_WITH_ADVANCE_PAYMENT = '70';

    /** The payment terms require the use of a certified cheque. */
    public const string CERTIFIED_CHEQUE = '71';

    /** The payment terms require cash payment before document transfer. */
    public const string CASH_AGAINST_DOCUMENTS = '72';

    /** The payment terms require the use of bill of exchange. */
    public const string BILL_OF_EXCHANGE = '73';

    /** The payment terms include a progressive discount based on the amount and speed with which payments are made. */
    public const string PROGRESSIVE_DISCOUNT = '74';

    /** The payment term requires a lump sum payment. */
    public const string LUMP_SUM = '75';

    /** The payment term requires a fixed fee payment. */
    public const string FIXED_FEE = '76';

    /** Self-explanatory. */
    public const string MUTUALLY_DEFINED = 'ZZZ';

    private function __construct(string $type, string $value)
    {
        $this->setType($type);
        $this->setValue($value);
    }

    public static function create(string $type, string $value): PaymentTerm
    {
        return new self($type, $value);
    }
}
