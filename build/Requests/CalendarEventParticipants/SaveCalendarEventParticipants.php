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

    /**
     * @param string|null $acceptanceState `A` = calendar event acceptance state accepted
     *                                     `D` = calendar event acceptance state declined
     *                                     `U` = calendar event acceptance state unknown
     * @param string|null $path            /calendarEventParticipants/1
     */
    public function __construct(
        protected ?array $calendarEvent = null,
        protected ?array $employee = null,
        protected ?bool $isReadOnly = null,
        protected ?string $acceptanceState = null,
        protected ?string $id = null,
        protected ?string $path = null,
        protected ?string $etag = null,
        protected ?bool $isDeleted = null,
        protected ?string $className = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/calendarEventParticipants';
    }

    public function defaultBody(): array
    {
        return array_filter([
            'CalendarEvent' => $this->calendarEvent,
            'Employee' => $this->employee,
            'IsReadOnly' => $this->isReadOnly,
            'AcceptanceState' => $this->acceptanceState,
            'Id' => $this->id,
            'Path' => $this->path,
            'ETag' => $this->etag,
            'IsDeleted' => $this->isDeleted,
            'ClassName' => $this->className,
        ]);
    }
}
