<?php

namespace Troi\V2\Requests\Clients;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch all Tenants (formerly Clients)
 *
 * Fetch all Tenants (formerly Clients)
 */
class FetchAllTenantsFormerlyClients extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/clients";
	}


	public function __construct()
	{
	}
}
