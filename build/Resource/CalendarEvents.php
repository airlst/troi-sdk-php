<?php

declare(strict_types=1);

namespace Troi\V2\Resource;

use Saloon\Http\Response;
use Troi\V2\Requests\CalendarEvents\DeleteCalendarEvent;
use Troi\V2\Requests\CalendarEvents\FetchAllCalendarEventsAtTheGivenRange;
use Troi\V2\Requests\CalendarEvents\FetchCalendarEventForTheGivenCalendarEventByExternalId;
use Troi\V2\Requests\CalendarEvents\FetchCalendarEventForTheGivenCalendarEventId;
use Troi\V2\Requests\CalendarEvents\SaveCalendarEvent;
use Troi\V2\Requests\CalendarEvents\UpdateCalendarEvent;
use Troi\V2\Requests\CalendarEvents\UpdateCalendarEventByExternalId;
use Troi\V2\Resource;

class CalendarEvents extends Resource
{
    /**
     * @param string $start           Start date (`YYYYMMDD`)
     * @param string $end             End date (`YYYYMMDD`)
     * @param string $searchKey       Search in calendar events for string
     * @param int    $ownerEmployeeId Employee owner
     * @param string $type            Calendar event type
     *
     * `R`=regular, `H`=holiday, `G`=general, `P`=private, `T`=assigment
     * @param bool   $withoutAbsences Return calendar event list without absences
     * @param string $externalId      ID of a system connected to Troi to simplify synchronization process
     */
    public function fetchAllCalendarEventsAtTheGivenRange(
        string $start,
        string $end,
        ?string $searchKey = null,
        ?int $ownerEmployeeId = null,
        ?string $type = null,
        ?bool $withoutAbsences = null,
        ?string $externalId = null,
    ): Response {
        return $this->connector->send(new FetchAllCalendarEventsAtTheGivenRange($start, $end, $searchKey, $ownerEmployeeId, $type, $withoutAbsences, $externalId));
    }

    /**
     * @param string $start yyyy-mm-dd hh:mm:ss
     * @param string $end   yyyy-mm-dd hh:mm:ss
     * @param string $type  `R`=regular, `H`=holiday, `G`=general, `P`=private, `T`=assigment
     */
    public function saveCalendarEvent(
        ?string $start = null,
        ?string $end = null,
        ?string $subject = null,
        ?string $description = null,
        ?string $location = null,
        ?array $owner = null,
        ?string $type = null,
        ?bool $isPublic = null,
        ?bool $isImportant = null,
        ?bool $isExternal = null,
        ?array $participants = null,
        ?array $syncParticipants = null,
        ?int $groupId = null,
        ?int $reminderMinutesBeforeStart = null,
        ?string $externalId = null,
        ?int $id = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new SaveCalendarEvent($start, $end, $subject, $description, $location, $owner, $type, $isPublic, $isImportant, $isExternal, $participants, $syncParticipants, $groupId, $reminderMinutesBeforeStart, $externalId, $id, $path, $etag, $isDeleted, $className));
    }

    /**
     * @param int $id Fetch calendar event for the given calendar event ID
     */
    public function fetchCalendarEventForTheGivenCalendarEventId(int $id): Response
    {
        return $this->connector->send(new FetchCalendarEventForTheGivenCalendarEventId($id));
    }

    /**
     * @param int    $id    Calendar event ID
     * @param string $start yyyy-mm-dd hh:mm:ss
     * @param string $end   yyyy-mm-dd hh:mm:ss
     * @param string $type  `R`=regular, `H`=holiday, `G`=general, `P`=private, `T`=assigment
     */
    public function updateCalendarEvent(
        int $id,
        ?string $start = null,
        ?string $end = null,
        ?string $subject = null,
        ?string $description = null,
        ?string $location = null,
        ?array $owner = null,
        ?string $type = null,
        ?bool $isPublic = null,
        ?bool $isImportant = null,
        ?bool $isExternal = null,
        ?array $participants = null,
        ?array $syncParticipants = null,
        ?int $groupId = null,
        ?int $reminderMinutesBeforeStart = null,
        ?string $externalId = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new UpdateCalendarEvent($id, $start, $end, $subject, $description, $location, $owner, $type, $isPublic, $isImportant, $isExternal, $participants, $syncParticipants, $groupId, $reminderMinutesBeforeStart, $externalId, $path, $etag, $isDeleted, $className));
    }

    /**
     * @param int $id Calendar event ID
     */
    public function deleteCalendarEvent(int $id): Response
    {
        return $this->connector->send(new DeleteCalendarEvent($id));
    }

    /**
     * @param int $id external calendar event ID
     */
    public function fetchCalendarEventForTheGivenCalendarEventByExternalId(int $id): Response
    {
        return $this->connector->send(new FetchCalendarEventForTheGivenCalendarEventByExternalId($id));
    }

    /**
     * @param int    $id    external calendar event ID
     * @param string $start yyyy-mm-dd hh:mm:ss
     * @param string $end   yyyy-mm-dd hh:mm:ss
     * @param string $type  `R`=regular, `H`=holiday, `G`=general, `P`=private, `T`=assigment
     */
    public function updateCalendarEventByExternalId(
        int $id,
        ?string $start = null,
        ?string $end = null,
        ?string $subject = null,
        ?string $description = null,
        ?string $location = null,
        ?array $owner = null,
        ?string $type = null,
        ?bool $isPublic = null,
        ?bool $isImportant = null,
        ?bool $isExternal = null,
        ?array $participants = null,
        ?array $syncParticipants = null,
        ?int $groupId = null,
        ?int $reminderMinutesBeforeStart = null,
        ?string $externalId = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new UpdateCalendarEventByExternalId($id, $start, $end, $subject, $description, $location, $owner, $type, $isPublic, $isImportant, $isExternal, $participants, $syncParticipants, $groupId, $reminderMinutesBeforeStart, $externalId, $path, $etag, $isDeleted, $className));
    }
}
