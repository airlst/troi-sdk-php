<?php

namespace Troi\V2\Requests\Billing;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Save Billing
 *
 * Save Billing
 */
class SaveBilling extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/billings/hours";
	}


	public function __construct()
	{
	}
}
