<?php

namespace Troi\V2\Requests\CalculationPositions;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Save Calculation Position
 *
 * Save Calculation Position
 */
class SaveCalculationPosition extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/calculationPositions";
	}


	public function __construct()
	{
	}
}
