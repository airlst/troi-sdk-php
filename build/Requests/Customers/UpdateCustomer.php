<?php

namespace Troi\V2\Requests\Customers;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update customer
 *
 * Update customer
 */
class UpdateCustomer extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/customers/{$this->id}";
	}


	/**
	 * @param int $id Customer ID
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
