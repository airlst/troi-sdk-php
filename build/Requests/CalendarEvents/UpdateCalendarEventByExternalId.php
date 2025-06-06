<?php

declare(strict_types=1);

namespace Troi\V2\Requests\CalendarEvents;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update calendar event by external ID.
 *
 * Update calendar event by external ID
 */
class UpdateCalendarEventByExternalId extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $id external calendar event ID
     */
    public function __construct(
        protected int $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/calendarEventsByExternalId/{$this->id}";
    }
}
