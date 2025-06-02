<?php

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
	 * @param int $start Start date
	 * @param int $end End date
	 * @param int $employeeId Employee id
	 */
	public function fetchAllAbsencesForTheCurrentEmployeeGivenStartDateAndEndDate(
		int $start,
		int $end,
		?int $employeeId,
	): Response
	{
		return $this->connector->send(new FetchAllAbsencesForTheCurrentEmployeeGivenStartDateAndEndDate($start, $end, $employeeId));
	}


	public function saveAbsenceObject(): Response
	{
		return $this->connector->send(new SaveAbsenceObject());
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
	public function updateAbsenceObject(int $id): Response
	{
		return $this->connector->send(new UpdateAbsenceObject($id));
	}
}
