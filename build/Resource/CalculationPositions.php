<?php

declare(strict_types=1);

namespace Troi\V2\Resource;

use Saloon\Http\Response;
use Troi\V2\Requests\CalculationPositions\DeleteCalculationPosition;
use Troi\V2\Requests\CalculationPositions\FetchAllCalculationPositionsForTheGivenClientId;
use Troi\V2\Requests\CalculationPositions\FetchCalculationPositionForTheGivenCalculationPositionId;
use Troi\V2\Requests\CalculationPositions\SaveCalculationPosition;
use Troi\V2\Requests\CalculationPositions\UpdateCalculationPosition;
use Troi\V2\Resource;

class CalculationPositions extends Resource
{
    /**
     * @param int    $clientId          Fetch all calculation positions for the given client ID
     * @param int    $projectId         Fetch all calculation positions for the given project ID
     * @param int    $subprojectId      Fetch all calculation positions for the given subproject ID
     * @param string $search            Fetch all calculation positions for the given search term
     * @param bool   $timeRecording     returns on valid time recording positions for the user
     * @param bool   $favoritesOnly     returns on favorite time recording positions for the user
     * @param bool   $withoutHourClosed returns only cp that are not closed for time recording
     * @param string $reeDate           return rest expenses estimation for the given calculation position
     *
     * Format: yyyymmdd OR dd.mm.yyyy OR current_date
     * @param int    $projectStatusId        Fetch all calculation positions for the given project status ID
     * @param bool   $bookKeeping            Fetch all calculation positions for the given book keeping
     * @param string $projectIds             Fetch all calculation positions for the given project IDs
     * @param string $issueTrackerProjectKey Fetch all calculation positions for the given issue tracker project key
     */
    public function fetchAllCalculationPositionsForTheGivenClientId(
        int $clientId,
        ?int $projectId = null,
        ?int $subprojectId = null,
        ?string $search = null,
        ?bool $timeRecording = null,
        ?bool $favoritesOnly = null,
        ?bool $withoutHourClosed = null,
        ?string $reeDate = null,
        ?int $projectStatusId = null,
        ?bool $bookKeeping = null,
        ?string $projectIds = null,
        ?string $issueTrackerProjectKey = null,
    ): Response {
        return $this->connector->send(new FetchAllCalculationPositionsForTheGivenClientId($clientId, $projectId, $subprojectId, $search, $timeRecording, $favoritesOnly, $withoutHourClosed, $reeDate, $projectStatusId, $bookKeeping, $projectIds, $issueTrackerProjectKey));
    }

    public function saveCalculationPosition(): Response
    {
        return $this->connector->send(new SaveCalculationPosition());
    }

    /**
     * @param int $id Fetch calculation position for the given calculation position ID
     */
    public function fetchCalculationPositionForTheGivenCalculationPositionId(int $id): Response
    {
        return $this->connector->send(new FetchCalculationPositionForTheGivenCalculationPositionId($id));
    }

    /**
     * @param int $id Calculation position ID
     */
    public function updateCalculationPosition(int $id): Response
    {
        return $this->connector->send(new UpdateCalculationPosition($id));
    }

    /**
     * @param int $id Calculation position ID
     */
    public function deleteCalculationPosition(int $id): Response
    {
        return $this->connector->send(new DeleteCalculationPosition($id));
    }
}
