<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Suppliers;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

use function is_null;

/**
 * Save supplier.
 *
 * Save supplier
 */
class SaveSupplier extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected ?array $client = null,
        protected ?array $creditor = null,
        protected ?array $paymentTerm = null,
        protected ?bool $isActive = null,
        protected ?array $contact = null,
        protected ?string $number = null,
        protected ?string $vatNumber = null,
        protected ?string $taxNumber = null,
        protected ?string $name = null,
        protected ?string $id = null,
        protected ?string $path = null,
        protected ?string $etag = null,
        protected ?bool $isDeleted = null,
        protected ?string $className = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/suppliers';
    }

    public function defaultBody(): array
    {
        return array_filter([
            'Client' => $this->client,
            'Creditor' => $this->creditor,
            'PaymentTerm' => $this->paymentTerm,
            'IsActive' => $this->isActive,
            'Contact' => $this->contact,
            'Number' => $this->number,
            'VatNumber' => $this->vatNumber,
            'TaxNumber' => $this->taxNumber,
            'Name' => $this->name,
            'Id' => $this->id,
            'Path' => $this->path,
            'ETag' => $this->etag,
            'IsDeleted' => $this->isDeleted,
            'ClassName' => $this->className,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
