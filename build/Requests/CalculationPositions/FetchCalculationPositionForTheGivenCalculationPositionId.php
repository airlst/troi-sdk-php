<?php

namespace Troi\V2\Requests\CalculationPositions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch calculation position for the given calculation position ID
 *
 * Fetch calculation position for the given calculation position ID
 */
class FetchCalculationPositionForTheGivenCalculationPositionId extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/calculationPositions/{$this->id}";
	}


	/**
	 * @param int $id Fetch calculation position for the given calculation position ID
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
