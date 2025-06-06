<?php

declare(strict_types=1);

namespace Troi\V2\Requests\CalendarEventParticipants;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Save calendar event participants.
 *
 * Save calendar event participants
 */
class SaveCalendarEventParticipants extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct() {}

    public function resolveEndpoint(): string
    {
        return '/calendarEventParticipants';
    }
}
