<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Contracts;

/**
 * all root document types must implement this interface
 *
 * - ORDER
 * - ORDERCHANGE
 * - ORDERRESPONSE
 * - DISPATCHNOTIFICATION
 * - INVOICE
 */
interface OpentransDocumentNode
{
    public function getXmlRootElementName(): string;
}
