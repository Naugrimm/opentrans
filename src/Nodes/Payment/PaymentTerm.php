<?php

namespace Naugrim\OpenTrans\Nodes\Payment;

use InvalidArgumentException;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\CanAssertConstantValue;
use Naugrim\OpenTrans\Nodes\Concerns\HasStringValue;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;
use ReflectionClass;

/**
 * Payment terms are aligned to UN/EDIFACT 4279 (Payment terms type code qualifier)
 * https://web.archive.org/web/20150418213750/http://www.unece.org/trade/untdid/d00b/tred/tred4279.htm
 */
class PaymentTerm implements NodeInterface
{
    use HasTypeAttribute, HasStringValue;

    /** Payment conditions normally applied. */
    public const BASIC = '1';

    /** Self-explanatory. */
    public const END_OF_MONTH = '2';

    /** Self-explanatory. */
    public const FIXED_DATE = '3';

    /** Self-explanatory. */
    public const DEFERRED = '4';

    /** Self-explanatory. */
    public const DISCOUNT_NOT_APPLICABLE = '5';

    /** Different payment terms negotiated under a documentary credit. */
    public const MIXED = '6';

    /** Self-explanatory. */
    public const EXTENDED = '7';

    /** Self-explanatory. */
    public const BASIC_DISCOUNT_OFFERED = '8';

    /** Occurring in the next month after present. */
    public const PROXIMO = '9';

    /** Payment is due on receipt of invoice. */
    public const INSTANT = '10';

    /** Payment terms to be chosen by buyer (from options separately advised). */
    public const ELECTIVE = '11';

    /** Payment due ten days after end of a calendar month. */
    public const TEN_DAYS_AFTER_END_OF_MONTH = '12';

    /** Seller will advise buyer of payment terms by separate transaction. */
    public const SELLER_TO_DVISE_BUYER = '13';

    /** Self-explanatory. */
    public const PAID_AGAINST_STATEMENT = '14';

    /** Self-explanatory. */
    public const NO_CHARGE = '15';

    /** Self-explanatory. */
    public const NOT_YET_DEFINED = '16';

    /** Payment is due the end of the current or specified month. */
    public const ULTIMO = '17';

    /** Self-explanatory. */
    public const PREVIOUSLY_AGREED_UPON = '18';

    /** The payment terms require the use of United States funds. */
    public const UNITED_STATES_FUNDS = '19';

    /** Self-explanatory. */
    public const PENALTY_TERMS = '20';

    /** Self-explanatory. */
    public const PAYMENT_BY_INSTALMENT = '21';

    /** Self-explanatory. */
    public const DISCOUNT = '22';

    /** Payment made at sight. */
    public const AVAILABLE_BY_SIGHT_PAYMENT = '23';

    /** Payment made at deferred date. */
    public const AVAILABLE_BY_DEFERRED_PAYMENT = '24';

    /** Payment on acceptance. */
    public const AVAILABLE_BY_ACCEPTANCE = '25';

    /** Payment made by negotiation with any bank. */
    public const AVAILABLE_BY_NEGOTIATION_WITH_ANY_BANK = '26';

    /** Payment made by negotiation with any bank in a specified location. */
    public const AVAILABLE_BY_NEGOTIATION_WITH_ANY_BANK_IN = '27';

    /** Payment made by negotiation with a specified financial institution. */
    public const AVAILABLE_BY_NEGOTIATION_BY_NAMED_BANK = '28';

    /** Payment made by negotiation. */
    public const AVAILABLE_BY_NEGOTIATION = '29';

    /** Payment adjusted for outstanding credits or debits. */
    public const ADJUSTMENT_PAYMENT = '30';

    /** Payment after due date. */
    public const LATE_PAYMENT = '31';

    /** Payment in advance of due date. */
    public const ADVANCED_PAYMENT = '32';

    /** Payment by instalments according to progress (as agreed). */
    public const PAYMENT_BY_INSTALMENTS_ACCORDING_TO_PROGRESS_AS_AGREED = '33';

    /** Payment by instalments according to progress (to be agreed). */
    public const PAYMENT_BY_INSTALMENTS_ACCORDING_TO_PROGRESS_TO_BE_AGREED = '34';

    /** Terms of payment differ from the normal terms. */
    public const NONSTANDARD = '35';

    /** Payment to be made according to bilaterally agreed conditions between buyer and seller. */
    public const TENOR_PAYMENT_TERMS = '36';

    /** Payment must be made for complete value and may not be paid in instalments. */
    public const COMPLETE_PAYMENT = '37';

    /** Payment terms are specified in a consolidated invoice. */
    public const PAYMENT_TERMS_DEFINED_IN_CONSOLIDATED_INVOICE = '38';

    /** The payment terms require payment upon completion. */
    public const PAYMENT_UPON_COMPLETION = '39';

    /** The payment terms require a partial payment in advance of completion. */
    public const PARTIAL_ADVANCE = '40';

    /** The payment terms are that the goods will be paid for when they are sold or consumed. */
    public const CONSIGNMENT = '41';

    /** The payment terms involve the use of an inter-company account. */
    public const INTER_COMPANY_ACCOUNT = '42';

    /** The payment terms involve a debtor who promises to pay a definite sum of money on demand or at a definite time in the future. */
    public const SELL_BY_NOTE = '43';

    /** The payment terms involve payment for merchandise owned by a third party. */
    public const SUPPLIER_FLOOR_PLAN = '44';

    /** The payment terms are based on a contract with a vendor. */
    public const CONTRACT_BASIS = '45';

    /** The payment terms involve the monitoring of credit by the grantor. */
    public const CREDIT_CONTROLLED = '46';

    /** The payment terms in which suppliers may extend seasonal dating. */
    public const DATING_GIVEN = '47';

    /** A trade acceptance is a written acknowledgement of the sale of goods and promise to pay at a definite date and place. */
    public const TRADE_ACCEPTANCE = '48';

    /** The payment terms permit reimbursement of costs plus other authorised changes. */
    public const COST_PLUS = '49';

    /** The payment terms require the use of a letter of credit. */
    public const LETTER_OF_CREDIT = '50';

    /** The payment terms are included in the lease agreement. */
    public const LEASE_AGREEMENT = '51';

    /** The payment terms are cash is due on delivery of  merchandise. */
    public const CASH_ON_DELIVERY = '52';

    /** The payment terms are dictated by state law requiring payment of cash. */
    public const CASH_BY_STATE_LAW = '53';

    /** The payment terms require the use of bank transfer. */
    public const BANK_TRANSFER = '54';

    /** The payment terms require payment by cash on arrival of the goods or services. */
    public const CASH_ON_ARRIVAL = '55';

    /** The payment terms are that payments are made in cash. */
    public const CASH = '56';

    /** The payment terms are that a discount is applicable if the payment is made in cash. */
    public const CASH_DISCOUNT_TERMS_APPLY = '57';

    /** The payment terms require the payment in cash with placement of the order. */
    public const CASH_WITH_ORDER = '58';

    /** The payment terms involve a vendor request for payment by cash. */
    public const CASH_PER_VENDOR_REQUEST = '59';

    /** The payment terms require the use of an irrevocable letter of credit. */
    public const IRREVOCABLE_LETTER_OF_CREDIT = '60';

    /** The payment terms require acceptance of liability before document transfer. */
    public const DOCUMENTS_AGAINST_ACCEPTANCE = '61';

    /** The payment terms permit the use of a charge card to effect payment. */
    public const CHARGE_CARD = '62';

    /** The payment terms require payment before document transfer. */
    public const DOCUMENTS_AGAINST_PAYMENT = '63';

    /** The payment terms are based on the time allowed by commercial usage for the payment of foreign bills of exchange. */
    public const USANCE_BILL = '64';

    /** The payment terms require the presentation of a letter of credit. */
    public const LETTER_OF_CREDIT_AT_SIGHT = '65';

    /** The payment terms call for the use of a secured account. */
    public const SECURED_ACCOUNT = '66';

    /** The payment terms call for the use of basic commission terms. */
    public const BASIC_COMMISSION_TERMS = '67';

    /** The payment terms require a deposit be provided. */
    public const DEPOSIT_REQUIRED = '68';

    /** The payment terms include a discount when payment is made within a time frame designated as prompt pay. */
    public const DISCOUNT_WITH_PROMPT_PAY = '69';

    /** The payment terms include a discount when payment is made in advance. */
    public const DISCOUNT_WITH_ADVANCE_PAYMENT = '70';

    /** The payment terms require the use of a certified cheque. */
    public const CERTIFIED_CHEQUE = '71';

    /** The payment terms require cash payment before document transfer. */
    public const CASH_AGAINST_DOCUMENTS = '72';

    /** The payment terms require the use of bill of exchange. */
    public const BILL_OF_EXCHANGE = '73';

    /** The payment terms include a progressive discount based on the amount and speed with which payments are made. */
    public const PROGRESSIVE_DISCOUNT = '74';

    /** The payment term requires a lump sum payment. */
    public const LUMP_SUM = '75';

    /** The payment term requires a fixed fee payment. */
    public const FIXED_FEE = '76';

    /** Self-explanatory. */
    public const MUTUALLY_DEFINED = 'ZZZ';

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
