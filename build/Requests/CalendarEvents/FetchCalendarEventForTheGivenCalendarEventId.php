<?php

namespace Troi\V2\Requests\CalendarEvents;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch calendar event for the given calendar event ID
 *
 * Fetch calendar event for the given calendar event ID
 */
class FetchCalendarEventForTheGivenCalendarEventId extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/calendarEvents/{$this->id}";
	}


	/**
	 * @param int $id Fetch calendar event for the given calendar event ID
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
