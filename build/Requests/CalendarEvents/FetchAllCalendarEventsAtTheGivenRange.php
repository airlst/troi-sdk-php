<?php

namespace Troi\V2\Requests\CalendarEvents;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch all calendar events at the given range
 *
 * Fetch all calendar events at the given range
 */
class FetchAllCalendarEventsAtTheGivenRange extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/calendarEvents";
	}


	/**
	 * @param string $start Start date (`YYYYMMDD`)
	 * @param string $end End date (`YYYYMMDD`)
	 * @param null|string $searchKey Search in calendar events for string
	 * @param null|int $ownerEmployeeId Employee owner
	 * @param null|string $type Calendar event type
	 *
	 * `R`=regular, `H`=holiday, `G`=general, `P`=private, `T`=assigment
	 * @param null|bool $withoutAbsences Return calendar event list without absences
	 * @param null|string $externalId ID of a system connected to Troi to simplify synchronization process
	 */
	public function __construct(
		protected string $start,
		protected string $end,
		protected ?string $searchKey = null,
		protected ?int $ownerEmployeeId = null,
		protected ?string $type = null,
		protected ?bool $withoutAbsences = null,
		protected ?string $externalId = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'start' => $this->start,
			'end' => $this->end,
			'search_key' => $this->searchKey,
			'owner_employee_id' => $this->ownerEmployeeId,
			'type' => $this->type,
			'withoutAbsences' => $this->withoutAbsences,
			'externalId' => $this->externalId,
		]);
	}
}
