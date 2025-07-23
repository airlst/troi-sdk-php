<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Absences;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Save Absence object.
 *
 * Save Absence object
 */
class SaveAbsenceObject extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
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
        protected ?int $id = null,
        protected ?string $path = null,
        protected ?string $etag = null,
        protected ?bool $isDeleted = null,
        protected ?string $className = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/absences';
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
            'id' => $this->id,
            'Path' => $this->path,
            'ETag' => $this->etag,
            'IsDeleted' => $this->isDeleted,
            'ClassName' => $this->className,
        ]);
    }
}
