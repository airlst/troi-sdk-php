<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Billing;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

use function is_null;

/**
 * Save Billing.
 *
 * Save Billing
 */
class SaveBilling extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
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
        protected ?int $id = null,
        protected ?string $path = null,
        protected ?string $etag = null,
        protected ?bool $isDeleted = null,
        protected ?string $className = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/billings/hours';
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
            'id' => $this->id,
            'Path' => $this->path,
            'ETag' => $this->etag,
            'IsDeleted' => $this->isDeleted,
            'ClassName' => $this->className,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
