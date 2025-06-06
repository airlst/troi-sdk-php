<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Customers;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch customer for the given customer ID.
 *
 * Fetch customer for the given customer ID
 */
class FetchCustomerForTheGivenCustomerId extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $id Fetch customer for the given customer ID
     */
    public function __construct(
        protected int $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/customers/{$this->id}";
    }
}
