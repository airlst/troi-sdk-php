<?php

declare(strict_types=1);

namespace Troi\V2\Requests\CalendarEvents;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete calendar event.
 *
 * Delete calendar event
 */
class DeleteCalendarEvent extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param int $id Calendar event ID
     */
    public function __construct(
        protected int $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/calendarEvents/{$this->id}";
    }
}
