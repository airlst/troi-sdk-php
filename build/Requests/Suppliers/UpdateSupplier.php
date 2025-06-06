<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Suppliers;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update supplier.
 *
 * Update supplier
 */
class UpdateSupplier extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $id Supplier ID
     */
    public function __construct(
        protected int $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/suppliers/{$this->id}";
    }
}
