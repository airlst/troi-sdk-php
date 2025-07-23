<?php

declare(strict_types=1);

namespace Troi\V2\Requests\AccountingEntryCollections;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Save accounting entry collections.
 *
 * Save accounting entry collections
 */
class SaveAccountingEntryCollections extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected ?array $client = null,
        protected ?string $fromDate = null,
        protected ?string $tillDate = null,
        protected ?bool $isLocked = null,
        protected ?array $createEmployee = null,
        protected ?string $createDate = null,
        protected ?int $type = null,
        protected ?int $id = null,
        protected ?string $path = null,
        protected ?string $etag = null,
        protected ?bool $isDeleted = null,
        protected ?string $className = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/accountingEntryCollections';
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
            'id' => $this->id,
            'Path' => $this->path,
            'ETag' => $this->etag,
            'IsDeleted' => $this->isDeleted,
            'ClassName' => $this->className,
        ]);
    }
}
