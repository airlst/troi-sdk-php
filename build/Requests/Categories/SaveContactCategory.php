<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Categories;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Save contact category.
 *
 * Save contact category
 */
class SaveContactCategory extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct() {}

    public function resolveEndpoint(): string
    {
        return '/contactCategories';
    }
}
