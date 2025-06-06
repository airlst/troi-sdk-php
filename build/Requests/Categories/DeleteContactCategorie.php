<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Categories;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete contact categorie.
 *
 * Delete contact categorie
 */
class DeleteContactCategorie extends Request
{
    protected Method $method = Method::DELETE;

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
