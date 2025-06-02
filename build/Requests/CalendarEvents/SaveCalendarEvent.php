<?php

namespace Troi\V2\Requests\CalendarEvents;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Save calendar event
 *
 * Save calendar event
 */
class SaveCalendarEvent extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/calendarEvents";
	}


	public function __construct()
	{
	}
}
