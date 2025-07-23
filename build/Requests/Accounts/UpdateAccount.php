<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Accounts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update Account.
 *
 * Update Account
 */
class UpdateAccount extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $id Account id
     */
    public function __construct(
        protected int $id,
        protected ?string $name = null,
        protected ?int $number = null,
        protected ?array $client = null,
        protected ?array $defaultContraAccount = null,
        protected ?array $summaryAccount = null,
        protected ?bool $isActive = null,
        protected ?bool $isCashDeskAccount = null,
        protected ?bool $isBankAccount = null,
        protected ?bool $isAutomaticAccount = null,
        protected ?bool $isLockedForDatev = null,
        protected ?array $taxRate = null,
        protected ?array $accountGroup = null,
        protected ?string $path = null,
        protected ?string $etag = null,
        protected ?bool $isDeleted = null,
        protected ?string $className = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/accounts/{$this->id}";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'Name' => $this->name,
            'Number' => $this->number,
            'Client' => $this->client,
            'DefaultContraAccount' => $this->defaultContraAccount,
            'SummaryAccount' => $this->summaryAccount,
            'IsActive' => $this->isActive,
            'IsCashDeskAccount' => $this->isCashDeskAccount,
            'IsBankAccount' => $this->isBankAccount,
            'IsAutomaticAccount' => $this->isAutomaticAccount,
            'IsLockedForDatev' => $this->isLockedForDatev,
            'TaxRate' => $this->taxRate,
            'AccountGroup' => $this->accountGroup,
            'Path' => $this->path,
            'ETag' => $this->etag,
            'IsDeleted' => $this->isDeleted,
            'ClassName' => $this->className,
        ]);
    }
}
