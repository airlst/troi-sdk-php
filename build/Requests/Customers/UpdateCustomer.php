<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Customers;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update customer.
 *
 * Update customer
 */
class UpdateCustomer extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $id Customer ID
     */
    public function __construct(
        protected int $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/customers/{$this->id}";
    }
}
