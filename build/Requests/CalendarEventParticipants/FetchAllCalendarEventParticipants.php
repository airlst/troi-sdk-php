<?php

namespace Troi\V2\Requests\CalendarEventParticipants;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch all calendar event participants
 *
 * Fetch all calendar event participants
 */
class FetchAllCalendarEventParticipants extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/calendarEventParticipants";
	}


	/**
	 * @param null|int $calendarEventId Fetch all calendar event participants for the given calendar event ID
	 * @param null|int $employeeId Fetch all calendar event participants for the given employee ID
	 */
	public function __construct(
		protected ?int $calendarEventId = null,
		protected ?int $employeeId = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['calendarEventId' => $this->calendarEventId, 'employeeId' => $this->employeeId]);
	}
}
