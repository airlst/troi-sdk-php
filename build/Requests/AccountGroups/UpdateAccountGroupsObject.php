<?php

declare(strict_types=1);

namespace Troi\V2\Requests\AccountGroups;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * Update Account Groups Object.
 *
 * Update Account Groups Object
 */
class UpdateAccountGroupsObject extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $id Account group id
     */
    public function __construct(
        protected int $id,
        protected ?string $name = null,
        protected ?array $client = null,
        protected ?int $type = null,
        protected ?string $path = null,
        protected ?string $etag = null,
        protected ?bool $isDeleted = null,
        protected ?string $className = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/accountGroups/{$this->id}";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'Name' => $this->name,
            'Client' => $this->client,
            'Type' => $this->type,
            'Path' => $this->path,
            'ETag' => $this->etag,
            'IsDeleted' => $this->isDeleted,
            'ClassName' => $this->className,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
