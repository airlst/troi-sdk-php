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
     * @param int         $id    external calendar event ID
     * @param string|null $start yyyy-mm-dd hh:mm:ss
     * @param string|null $end   yyyy-mm-dd hh:mm:ss
     * @param string|null $type  `R`=regular, `H`=holiday, `G`=general, `P`=private, `T`=assigment
     */
    public function __construct(
        protected int $id,
        protected ?string $start = null,
        protected ?string $end = null,
        protected ?string $subject = null,
        protected ?string $description = null,
        protected ?string $location = null,
        protected ?array $owner = null,
        protected ?string $type = null,
        protected ?bool $isPublic = null,
        protected ?bool $isImportant = null,
        protected ?bool $isExternal = null,
        protected ?array $participants = null,
        protected ?array $syncParticipants = null,
        protected ?int $groupId = null,
        protected ?int $reminderMinutesBeforeStart = null,
        protected ?string $externalId = null,
        protected ?string $path = null,
        protected ?string $etag = null,
        protected ?bool $isDeleted = null,
        protected ?string $className = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/calendarEventsByExternalId/{$this->id}";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'Start' => $this->start,
            'End' => $this->end,
            'Subject' => $this->subject,
            'Description' => $this->description,
            'Location' => $this->location,
            'Owner' => $this->owner,
            'Type' => $this->type,
            'IsPublic' => $this->isPublic,
            'IsImportant' => $this->isImportant,
            'IsExternal' => $this->isExternal,
            'Participants' => $this->participants,
            'SyncParticipants' => $this->syncParticipants,
            'GroupId' => $this->groupId,
            'ReminderMinutesBeforeStart' => $this->reminderMinutesBeforeStart,
            'ExternalId' => $this->externalId,
            'Path' => $this->path,
            'ETag' => $this->etag,
            'IsDeleted' => $this->isDeleted,
            'ClassName' => $this->className,
        ]);
    }
}
