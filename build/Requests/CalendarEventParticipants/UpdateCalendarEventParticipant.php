<?php

declare(strict_types=1);

namespace Troi\V2\Requests\CalendarEventParticipants;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update calendar event participant.
 *
 * Update calendar event participant
 */
class UpdateCalendarEventParticipant extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $id Calendar event participant ID
     */
    public function __construct(
        protected int $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/calendarEventParticipants/{$this->id}";
    }
}
