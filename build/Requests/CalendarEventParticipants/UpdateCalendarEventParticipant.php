<?php

declare(strict_types=1);

namespace Troi\V2\Requests\CalendarEventParticipants;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * Update calendar event participant.
 *
 * Update calendar event participant
 */
class UpdateCalendarEventParticipant extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int         $id              Calendar event participant ID
     * @param string|null $acceptanceState `A` = calendar event acceptance state accepted
     *                                     `D` = calendar event acceptance state declined
     *                                     `U` = calendar event acceptance state unknown
     * @param string|null $path            /calendarEventParticipants/1
     */
    public function __construct(
        protected int $id,
        protected ?array $calendarEvent = null,
        protected ?array $employee = null,
        protected ?bool $isReadOnly = null,
        protected ?string $acceptanceState = null,
        protected ?string $path = null,
        protected ?string $etag = null,
        protected ?bool $isDeleted = null,
        protected ?string $className = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/calendarEventParticipants/{$this->id}";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'CalendarEvent' => $this->calendarEvent,
            'Employee' => $this->employee,
            'IsReadOnly' => $this->isReadOnly,
            'AcceptanceState' => $this->acceptanceState,
            'Path' => $this->path,
            'ETag' => $this->etag,
            'IsDeleted' => $this->isDeleted,
            'ClassName' => $this->className,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
