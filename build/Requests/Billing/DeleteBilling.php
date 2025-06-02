<?php

namespace Troi\V2\Requests\Billing;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete Billing
 *
 * Delete Billing
 */
class DeleteBilling extends Request
{
	protected Method $method = Method::DELETE;


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
