<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Categories;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update contact categorie.
 *
 * Update contact categorie
 */
class UpdateContactCategorie extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $id Contact categorie ID
     */
    public function __construct(
        protected int $id,
        protected ?string $name = null,
        protected ?array $category = null,
        protected ?array $contact = null,
        protected ?string $path = null,
        protected ?string $etag = null,
        protected ?bool $isDeleted = null,
        protected ?string $className = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/contactCategories/{$this->id}";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'Name' => $this->name,
            'Category' => $this->category,
            'Contact' => $this->contact,
            'Path' => $this->path,
            'ETag' => $this->etag,
            'IsDeleted' => $this->isDeleted,
            'ClassName' => $this->className,
        ]);
    }
}
