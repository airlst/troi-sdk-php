<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Suppliers;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch supplier for the given supplier ID.
 *
 * Fetch supplier for the given supplier ID
 */
class FetchSupplierForTheGivenSupplierId extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $id Fetch supplier for the given supplier ID
     */
    public function __construct(
        protected int $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/suppliers/{$this->id}";
    }
}
