<?php

namespace Troi\V2\Requests\CalendarEventParticipants;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete calendar event participant
 *
 * Delete calendar event participant
 */
class DeleteCalendarEventParticipant extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/calendarEventParticipants/{$this->id}";
	}


	/**
	 * @param int $id Calendar event participant ID
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
