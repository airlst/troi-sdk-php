<?php

namespace Troi\V2\Requests\Contacts;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch contact for the given ID
 *
 * Fetch contact for the given ID
 */
class FetchContactForTheGivenId extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/contacts/{$this->id}";
	}


	/**
	 * @param int $id Fetch contact for the given ID
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
