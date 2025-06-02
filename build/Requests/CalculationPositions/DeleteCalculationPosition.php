<?php

namespace Troi\V2\Requests\CalculationPositions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete calculation position
 *
 * Delete calculation position
 */
class DeleteCalculationPosition extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/calculationPositions/{$this->id}";
	}


	/**
	 * @param int $id Calculation position ID
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
