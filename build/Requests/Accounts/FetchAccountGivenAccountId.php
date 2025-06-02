<?php

namespace Troi\V2\Requests\Accounts;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch Account given Account ID
 *
 * Fetch Account given Account ID
 */
class FetchAccountGivenAccountId extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/accounts/{$this->id}";
	}


	/**
	 * @param int $id Account id
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
