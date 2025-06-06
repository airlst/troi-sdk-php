<?php

declare(strict_types=1);

namespace Troi\V2\Resource;

use Saloon\Http\Response;
use Troi\V2\Requests\CalendarEventParticipants\DeleteCalendarEventParticipant;
use Troi\V2\Requests\CalendarEventParticipants\FetchAllCalendarEventParticipants;
use Troi\V2\Requests\CalendarEventParticipants\FetchCalendarEventParticipantForTheGivenCalendarEventParticipantId;
use Troi\V2\Requests\CalendarEventParticipants\SaveCalendarEventParticipants;
use Troi\V2\Requests\CalendarEventParticipants\UpdateCalendarEventParticipant;
use Troi\V2\Resource;

class CalendarEventParticipants extends Resource
{
    /**
     * @param int $calendarEventId Fetch all calendar event participants for the given calendar event ID
     * @param int $employeeId      Fetch all calendar event participants for the given employee ID
     */
    public function fetchAllCalendarEventParticipants(?int $calendarEventId = null, ?int $employeeId = null): Response
    {
        return $this->connector->send(new FetchAllCalendarEventParticipants($calendarEventId, $employeeId));
    }

    public function saveCalendarEventParticipants(): Response
    {
        return $this->connector->send(new SaveCalendarEventParticipants());
    }

    /**
     * @param int $id Fetch calendar event participant for the given calendar event participant ID
     */
    public function fetchCalendarEventParticipantForTheGivenCalendarEventParticipantId(int $id): Response
    {
        return $this->connector->send(new FetchCalendarEventParticipantForTheGivenCalendarEventParticipantId($id));
    }

    /**
     * @param int $id Calendar event participant ID
     */
    public function updateCalendarEventParticipant(int $id): Response
    {
        return $this->connector->send(new UpdateCalendarEventParticipant($id));
    }

    /**
     * @param int $id Calendar event participant ID
     */
    public function deleteCalendarEventParticipant(int $id): Response
    {
        return $this->connector->send(new DeleteCalendarEventParticipant($id));
    }
}
