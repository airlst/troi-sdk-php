<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Absences;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update Absence object.
 *
 * Update Absence object
 */
class UpdateAbsenceObject extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $id Absence id
     */
    public function __construct(
        protected int $id,
        protected ?string $start = null,
        protected ?string $end = null,
        protected ?string $subject = null,
        protected ?string $description = null,
        protected ?array $destination = null,
        protected ?array $employee = null,
        protected ?array $absenceType = null,
        protected ?int $halfDay = null,
        protected ?int $absenceUnit = null,
        protected ?int $absenceHours = null,
        protected ?string $path = null,
        protected ?string $etag = null,
        protected ?bool $isDeleted = null,
        protected ?string $className = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/absences/{$this->id}";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'Start' => $this->start,
            'End' => $this->end,
            'Subject' => $this->subject,
            'Description' => $this->description,
            'Destination' => $this->destination,
            'Employee' => $this->employee,
            'absenceType' => $this->absenceType,
            'halfDay' => $this->halfDay,
            'absenceUnit' => $this->absenceUnit,
            'absenceHours' => $this->absenceHours,
            'Path' => $this->path,
            'ETag' => $this->etag,
            'IsDeleted' => $this->isDeleted,
            'ClassName' => $this->className,
        ]);
    }
}
