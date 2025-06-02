<?php

namespace Troi\V2\Requests\Absences;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch all absences for the current employee given Start Date and End Date
 *
 * Fetch all absences for the current employee given Start Date and End Date
 */
class FetchAllAbsencesForTheCurrentEmployeeGivenStartDateAndEndDate extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/absences";
	}


	/**
	 * @param int $start Start date
	 * @param int $end End date
	 * @param null|int $employeeId Employee id
	 */
	public function __construct(
		protected int $start,
		protected int $end,
		protected ?int $employeeId = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['start' => $this->start, 'end' => $this->end, 'employeeId' => $this->employeeId]);
	}
}
