<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Billing;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update Billing.
 *
 * Update Billing
 */
class UpdateBilling extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $id Billing id
     */
    public function __construct(
        protected int $id,
        protected mixed $client = null,
        protected mixed $calculationPosition = null,
        protected ?array $service = null,
        protected mixed $employee = null,
        protected ?string $date = null,
        protected float|int|null $quantity = null,
        protected ?string $remark = null,
        protected ?bool $isBillable = null,
        protected ?bool $isBilled = null,
        protected ?bool $isInvoiced = null,
        protected ?bool $isApproved = null,
        protected ?string $path = null,
        protected ?string $etag = null,
        protected ?bool $isDeleted = null,
        protected ?string $className = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/billings/hours/{$this->id}";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'Client' => $this->client,
            'CalculationPosition' => $this->calculationPosition,
            'Service' => $this->service,
            'Employee' => $this->employee,
            'Date' => $this->date,
            'Quantity' => $this->quantity,
            'Remark' => $this->remark,
            'IsBillable' => $this->isBillable,
            'IsBilled' => $this->isBilled,
            'IsInvoiced' => $this->isInvoiced,
            'IsApproved' => $this->isApproved,
            'Path' => $this->path,
            'ETag' => $this->etag,
            'IsDeleted' => $this->isDeleted,
            'ClassName' => $this->className,
        ]);
    }
}
