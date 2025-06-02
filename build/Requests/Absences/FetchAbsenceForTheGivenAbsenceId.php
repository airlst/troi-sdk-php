<?php

namespace Troi\V2\Requests\Absences;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch Absence for the given Absence ID
 *
 * Fetch Absence for the given Absence ID
 */
class FetchAbsenceForTheGivenAbsenceId extends Request
{
	protected Method $method = Method::GET;


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
