<?php

namespace Troi\V2\Requests\CalendarEvents;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete calendar event
 *
 * Delete calendar event
 */
class DeleteCalendarEvent extends Request
{
	protected Method $method = Method::DELETE;


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
