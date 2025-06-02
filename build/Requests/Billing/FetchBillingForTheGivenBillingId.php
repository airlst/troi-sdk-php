<?php

namespace Troi\V2\Requests\Billing;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch Billing for the given Billing ID
 *
 * Fetch Billing for the given Billing ID
 */
class FetchBillingForTheGivenBillingId extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/billings/hours/{$this->id}";
	}


	/**
	 * @param int $id Fetch Billing for the given Billing ID
	 * @param null|bool $extendedObject extended object contains the full calculation position display path
	 */
	public function __construct(
		protected int $id,
		protected ?bool $extendedObject = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['extendedObject' => $this->extendedObject]);
	}
}
