<?php

declare(strict_types=1);

namespace Troi\V2\Requests\AccountingEntryCollections;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * Update accounting entry collection.
 *
 * Update accounting entry collection
 */
class UpdateAccountingEntryCollection extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $id Accounting entry collection id
     */
    public function __construct(
        protected int $id,
        protected ?array $client = null,
        protected ?string $fromDate = null,
        protected ?string $tillDate = null,
        protected ?bool $isLocked = null,
        protected ?array $createEmployee = null,
        protected ?string $createDate = null,
        protected ?int $type = null,
        protected ?string $path = null,
        protected ?string $etag = null,
        protected ?bool $isDeleted = null,
        protected ?string $className = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/accountingEntryCollections/{$this->id}";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'Client' => $this->client,
            'FromDate' => $this->fromDate,
            'TillDate' => $this->tillDate,
            'IsLocked' => $this->isLocked,
            'CreateEmployee' => $this->createEmployee,
            'CreateDate' => $this->createDate,
            'Type' => $this->type,
            'Path' => $this->path,
            'ETag' => $this->etag,
            'IsDeleted' => $this->isDeleted,
            'ClassName' => $this->className,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
