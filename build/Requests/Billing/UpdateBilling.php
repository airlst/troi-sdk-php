<?php

namespace Troi\V2\Requests\Billing;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update Billing
 *
 * Update Billing
 */
class UpdateBilling extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/billings/hours/{$this->id}";
	}


	/**
	 * @param int $id Billing id
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
