<?php

declare(strict_types=1);

namespace Troi\V2\Requests\CalendarEvents;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch all calendar events at the given range.
 *
 * Fetch all calendar events at the given range
 */
class FetchAllCalendarEventsAtTheGivenRange extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param string      $start           Start date (`YYYYMMDD`)
     * @param string      $end             End date (`YYYYMMDD`)
     * @param string|null $searchKey       Search in calendar events for string
     * @param int|null    $ownerEmployeeId Employee owner
     * @param string|null $type            Calendar event type
     *
     * `R`=regular, `H`=holiday, `G`=general, `P`=private, `T`=assigment
     * @param bool|null   $withoutAbsences Return calendar event list without absences
     * @param string|null $externalId      ID of a system connected to Troi to simplify synchronization process
     */
    public function __construct(
        protected string $start,
        protected string $end,
        protected ?string $searchKey = null,
        protected ?int $ownerEmployeeId = null,
        protected ?string $type = null,
        protected ?bool $withoutAbsences = null,
        protected ?string $externalId = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/calendarEvents';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'start' => $this->start,
            'end' => $this->end,
            'search_key' => $this->searchKey,
            'owner_employee_id' => $this->ownerEmployeeId,
            'type' => $this->type,
            'withoutAbsences' => $this->withoutAbsences,
            'externalId' => $this->externalId,
        ]);
    }
}
