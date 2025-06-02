<?php

namespace Troi\V2\Requests\CalendarEvents;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch calendar event for the given calendar event by external ID
 *
 * Fetch calendar event for the given calendar event by external ID
 */
class FetchCalendarEventForTheGivenCalendarEventByExternalId extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/calendarEventsByExternalId/{$this->id}";
	}


	/**
	 * @param int $id external calendar event ID
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
