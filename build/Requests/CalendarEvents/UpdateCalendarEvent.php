<?php

namespace Troi\V2\Requests\CalendarEvents;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update calendar event
 *
 * Update calendar event
 */
class UpdateCalendarEvent extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/calendarEvents/{$this->id}";
	}


	/**
	 * @param int $id Calendar event ID
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
