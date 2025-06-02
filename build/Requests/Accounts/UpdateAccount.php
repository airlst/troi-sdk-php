<?php

namespace Troi\V2\Requests\Accounts;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update Account
 *
 * Update Account
 */
class UpdateAccount extends Request
{
	protected Method $method = Method::PUT;


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
