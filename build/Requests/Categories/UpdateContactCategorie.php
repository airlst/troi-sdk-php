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
    ) {}

    public function resolveEndpoint(): string
    {
        return "/contactCategories/{$this->id}";
    }
}
