<?php

namespace Troi\V2\Requests\CalendarEventParticipants;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update calendar event participant
 *
 * Update calendar event participant
 */
class UpdateCalendarEventParticipant extends Request
{
	protected Method $method = Method::PUT;


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
