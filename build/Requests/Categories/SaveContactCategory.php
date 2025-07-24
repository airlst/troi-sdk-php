<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Categories;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

use function is_null;

/**
 * Save contact category.
 *
 * Save contact category
 */
class SaveContactCategory extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected ?string $name = null,
        protected ?array $category = null,
        protected ?array $contact = null,
        protected ?int $id = null,
        protected ?string $path = null,
        protected ?string $etag = null,
        protected ?bool $isDeleted = null,
        protected ?string $className = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/contactCategories';
    }

    public function defaultBody(): array
    {
        return array_filter([
            'Name' => $this->name,
            'Category' => $this->category,
            'Contact' => $this->contact,
            'Id' => $this->id,
            'Path' => $this->path,
            'ETag' => $this->etag,
            'IsDeleted' => $this->isDeleted,
            'ClassName' => $this->className,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
