<?php

namespace Troi\V2\Requests\Clients;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch client for the given client ID
 *
 * Fetch client for the given client ID
 */
class FetchClientForTheGivenClientId extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/clients/{$this->id}";
	}


	/**
	 * @param int $id Fetch client for the given client ID
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
