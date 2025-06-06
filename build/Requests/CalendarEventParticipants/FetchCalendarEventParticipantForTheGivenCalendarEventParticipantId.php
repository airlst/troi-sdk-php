<?php

declare(strict_types=1);

namespace Troi\V2\Requests\CalendarEventParticipants;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch calendar event participant for the given calendar event participant ID.
 *
 * Fetch calendar event participant for the given calendar event participant ID
 */
class FetchCalendarEventParticipantForTheGivenCalendarEventParticipantId extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $id Fetch calendar event participant for the given calendar event participant ID
     */
    public function __construct(
        protected int $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/calendarEventParticipants/{$this->id}";
    }
}
