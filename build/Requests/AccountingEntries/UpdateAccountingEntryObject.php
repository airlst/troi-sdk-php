<?php

declare(strict_types=1);

namespace Troi\V2\Requests\AccountingEntries;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * Update Accounting Entry Object.
 *
 * Update Accounting Entry Object
 */
class UpdateAccountingEntryObject extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $id Accounting entry id
     */
    public function __construct(
        protected int $id,
        protected ?array $client = null,
        protected ?array $costCenter = null,
        protected ?array $costCenter1 = null,
        protected ?array $costCenter2 = null,
        protected ?int $amount = null,
        protected ?array $account = null,
        protected ?array $contraAccount = null,
        protected ?array $accountingEntryCollection = null,
        protected ?string $documentDate = null,
        protected ?string $documentNumber = null,
        protected ?string $documentNumber2 = null,
        protected ?string $dmsLink = null,
        protected ?string $besrReferenceNumber = null,
        protected ?string $description = null,
        protected ?array $calculationPosition = null,
        protected ?array $taxRate = null,
        protected ?int $location = null,
        protected ?bool $isNotBillable = null,
        protected ?bool $isBilled = null,
        protected ?bool $isPaid = null,
        protected ?bool $isKsk = null,
        protected ?bool $isSplitBase = null,
        protected ?int $parentId = null,
        protected ?array $paymentTerm = null,
        protected ?string $projectNumber = null,
        protected ?string $path = null,
        protected ?string $etag = null,
        protected ?bool $isDeleted = null,
        protected ?string $className = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/accountingEntries/{$this->id}";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'Client' => $this->client,
            'CostCenter' => $this->costCenter,
            'CostCenter1' => $this->costCenter1,
            'CostCenter2' => $this->costCenter2,
            'Amount' => $this->amount,
            'Account' => $this->account,
            'ContraAccount' => $this->contraAccount,
            'AccountingEntryCollection' => $this->accountingEntryCollection,
            'DocumentDate' => $this->documentDate,
            'DocumentNumber' => $this->documentNumber,
            'DocumentNumber2' => $this->documentNumber2,
            'DmsLink' => $this->dmsLink,
            'BesrReferenceNumber' => $this->besrReferenceNumber,
            'Description' => $this->description,
            'CalculationPosition' => $this->calculationPosition,
            'TaxRate' => $this->taxRate,
            'Location' => $this->location,
            'IsNotBillable' => $this->isNotBillable,
            'IsBilled' => $this->isBilled,
            'IsPaid' => $this->isPaid,
            'IsKsk' => $this->isKsk,
            'IsSplitBase' => $this->isSplitBase,
            'ParentId' => $this->parentId,
            'PaymentTerm' => $this->paymentTerm,
            'ProjectNumber' => $this->projectNumber,
            'Path' => $this->path,
            'ETag' => $this->etag,
            'IsDeleted' => $this->isDeleted,
            'ClassName' => $this->className,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
