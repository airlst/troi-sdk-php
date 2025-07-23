<?php

declare(strict_types=1);

namespace Troi\V2\Resource;

use Saloon\Http\Response;
use Troi\V2\Requests\Absences\FetchAbsenceForTheGivenAbsenceId;
use Troi\V2\Requests\Absences\FetchAllAbsencesForTheCurrentEmployeeGivenStartDateAndEndDate;
use Troi\V2\Requests\Absences\SaveAbsenceObject;
use Troi\V2\Requests\Absences\UpdateAbsenceObject;
use Troi\V2\Resource;

class Absences extends Resource
{
    /**
     * @param int $start      Start date
     * @param int $end        End date
     * @param int $employeeId Employee id
     */
    public function fetchAllAbsencesForTheCurrentEmployeeGivenStartDateAndEndDate(
        int $start,
        int $end,
        ?int $employeeId = null,
    ): Response {
        return $this->connector->send(new FetchAllAbsencesForTheCurrentEmployeeGivenStartDateAndEndDate($start, $end, $employeeId));
    }

    public function saveAbsenceObject(
        ?string $start = null,
        ?string $end = null,
        ?string $subject = null,
        ?string $description = null,
        ?array $destination = null,
        ?array $employee = null,
        ?array $absenceType = null,
        ?int $halfDay = null,
        ?int $absenceUnit = null,
        ?int $absenceHours = null,
        ?int $id = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new SaveAbsenceObject($start, $end, $subject, $description, $destination, $employee, $absenceType, $halfDay, $absenceUnit, $absenceHours, $id, $path, $etag, $isDeleted, $className));
    }

    /**
     * @param int $id Absence id
     */
    public function fetchAbsenceForTheGivenAbsenceId(int $id): Response
    {
        return $this->connector->send(new FetchAbsenceForTheGivenAbsenceId($id));
    }

    /**
     * @param int $id Absence id
     */
    public function updateAbsenceObject(
        int $id,
        ?string $start = null,
        ?string $end = null,
        ?string $subject = null,
        ?string $description = null,
        ?array $destination = null,
        ?array $employee = null,
        ?array $absenceType = null,
        ?int $halfDay = null,
        ?int $absenceUnit = null,
        ?int $absenceHours = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new UpdateAbsenceObject($id, $start, $end, $subject, $description, $destination, $employee, $absenceType, $halfDay, $absenceUnit, $absenceHours, $path, $etag, $isDeleted, $className));
    }
}
