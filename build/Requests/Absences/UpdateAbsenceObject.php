<?php

namespace Troi\V2\Requests\Absences;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update Absence object
 *
 * Update Absence object
 */
class UpdateAbsenceObject extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/absences/{$this->id}";
	}


	/**
	 * @param int $id Absence id
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
