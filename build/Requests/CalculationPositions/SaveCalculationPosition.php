<?php

declare(strict_types=1);

namespace Troi\V2\Requests\CalculationPositions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

use function is_null;

/**
 * Save Calculation Position.
 *
 * Save Calculation Position
 */
class SaveCalculationPosition extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected ?int $orderNumber = null,
        protected ?string $name = null,
        protected ?string $externalDescription = null,
        protected ?string $internalDescription = null,
        protected ?array $project = null,
        protected ?array $subproject = null,
        protected ?array $customer = null,
        protected ?bool $isExternalService = null,
        protected ?bool $isServiceNeeded = null,
        protected ?string $displayPath = null,
        protected ?int $quantity = null,
        protected float|int|null $salePrice = null,
        protected float|int|null $purchasePrice = null,
        protected float|int|null $totalCalculation = null,
        protected ?array $unit = null,
        protected ?array $service = null,
        protected ?bool $isBillable = null,
        protected ?bool $isOptional = null,
        protected ?bool $isPrintable = null,
        protected ?bool $hourClosed = null,
        protected ?int $accountId = null,
        protected ?int $costCenterId = null,
        protected ?int $createdBy = null,
        protected ?int $modifiedBy = null,
        protected ?int $deletedBy = null,
        protected ?string $createdAt = null,
        protected ?string $modifiedAt = null,
        protected ?string $deletedAt = null,
        protected ?int $percentageMode = null,
        protected ?bool $isPercentageGlobal = null,
        protected ?string $serviceSource = null,
        protected ?array $taxRate = null,
        protected ?int $id = null,
        protected ?string $path = null,
        protected ?string $etag = null,
        protected ?bool $isDeleted = null,
        protected float|int|null $totalOffer = null,
        protected ?string $rsas = null,
        protected ?string $lastRsaDate = null,
        protected ?bool $cpIsCleared = null,
        protected ?string $className = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/calculationPositions';
    }

    public function defaultBody(): array
    {
        return array_filter([
            'OrderNumber' => $this->orderNumber,
            'Name' => $this->name,
            'ExternalDescription' => $this->externalDescription,
            'InternalDescription' => $this->internalDescription,
            'Project' => $this->project,
            'Subproject' => $this->subproject,
            'Customer' => $this->customer,
            'IsExternalService' => $this->isExternalService,
            'IsServiceNeeded' => $this->isServiceNeeded,
            'DisplayPath' => $this->displayPath,
            'Quantity' => $this->quantity,
            'SalePrice' => $this->salePrice,
            'PurchasePrice' => $this->purchasePrice,
            'TotalCalculation' => $this->totalCalculation,
            'Unit' => $this->unit,
            'Service' => $this->service,
            'IsBillable' => $this->isBillable,
            'IsOptional' => $this->isOptional,
            'IsPrintable' => $this->isPrintable,
            'HourClosed' => $this->hourClosed,
            'AccountId' => $this->accountId,
            'CostCenterId' => $this->costCenterId,
            'CreatedBy' => $this->createdBy,
            'ModifiedBy' => $this->modifiedBy,
            'DeletedBy' => $this->deletedBy,
            'CreatedAt' => $this->createdAt,
            'ModifiedAt' => $this->modifiedAt,
            'DeletedAt' => $this->deletedAt,
            'PercentageMode' => $this->percentageMode,
            'IsPercentageGlobal' => $this->isPercentageGlobal,
            'ServiceSource' => $this->serviceSource,
            'TaxRate' => $this->taxRate,
            'id' => $this->id,
            'Path' => $this->path,
            'ETag' => $this->etag,
            'IsDeleted' => $this->isDeleted,
            'TotalOffer' => $this->totalOffer,
            'RSAs' => $this->rsas,
            'lastRsaDate' => $this->lastRsaDate,
            'cpIsCleared' => $this->cpIsCleared,
            'ClassName' => $this->className,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
