<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Clients;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch all Tenants (formerly Clients).
 *
 * Fetch all Tenants (formerly Clients)
 */
class FetchAllTenantsFormerlyClients extends Request
{
    protected Method $method = Method::GET;

    public function __construct() {}

    public function resolveEndpoint(): string
    {
        return '/clients';
    }
}
