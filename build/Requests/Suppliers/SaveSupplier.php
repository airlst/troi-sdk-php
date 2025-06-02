<?php

namespace Troi\V2\Requests\Suppliers;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Save supplier
 *
 * Save supplier
 */
class SaveSupplier extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/suppliers";
	}


	public function __construct()
	{
	}
}
