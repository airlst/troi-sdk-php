<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Customers;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Save customer.
 *
 * Save customer
 */
class SaveCustomer extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param string|null $path /customers/1
     */
    public function __construct(
        protected ?array $client = null,
        protected ?array $debitor = null,
        protected ?array $taxRate = null,
        protected ?int $taxRateDisplayMode = null,
        protected ?array $paymentTerm = null,
        protected ?bool $isActive = null,
        protected ?array $contact = null,
        protected ?string $shortcut = null,
        protected ?string $number = null,
        protected ?string $vatNumber = null,
        protected ?string $taxNumber = null,
        protected ?string $name = null,
        protected ?string $customerDefaultEmail = null,
        protected ?string $fileShareName = null,
        protected ?string $id = null,
        protected ?string $path = null,
        protected ?string $etag = null,
        protected ?bool $isDeleted = null,
        protected ?string $className = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/customers';
    }

    public function defaultBody(): array
    {
        return array_filter([
            'Client' => $this->client,
            'Debitor' => $this->debitor,
            'TaxRate' => $this->taxRate,
            'TaxRateDisplayMode' => $this->taxRateDisplayMode,
            'PaymentTerm' => $this->paymentTerm,
            'IsActive' => $this->isActive,
            'Contact' => $this->contact,
            'Shortcut' => $this->shortcut,
            'Number' => $this->number,
            'VatNumber' => $this->vatNumber,
            'TaxNumber' => $this->taxNumber,
            'Name' => $this->name,
            'customerDefaultEmail' => $this->customerDefaultEmail,
            'FileShareName' => $this->fileShareName,
            'Id' => $this->id,
            'Path' => $this->path,
            'ETag' => $this->etag,
            'IsDeleted' => $this->isDeleted,
            'ClassName' => $this->className,
        ]);
    }
}
