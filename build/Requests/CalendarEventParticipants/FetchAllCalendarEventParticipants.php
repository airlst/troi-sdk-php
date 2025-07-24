<?php

declare(strict_types=1);

namespace Troi\V2\Requests\CalendarEventParticipants;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * Fetch all calendar event participants.
 *
 * Fetch all calendar event participants
 */
class FetchAllCalendarEventParticipants extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int|null $calendarEventId Fetch all calendar event participants for the given calendar event ID
     * @param int|null $employeeId      Fetch all calendar event participants for the given employee ID
     */
    public function __construct(
        protected ?int $calendarEventId = null,
        protected ?int $employeeId = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/calendarEventParticipants';
    }

    protected function defaultQuery(): array
    {
        return array_filter(['calendarEventId' => $this->calendarEventId, 'employeeId' => $this->employeeId], fn (mixed $value): bool => ! is_null($value));
    }
}
