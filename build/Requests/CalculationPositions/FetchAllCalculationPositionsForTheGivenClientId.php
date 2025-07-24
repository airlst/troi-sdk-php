<?php

declare(strict_types=1);

namespace Troi\V2\Requests\CalculationPositions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * Fetch all calculation positions for the given client ID.
 *
 * Fetch all calculation Positions for the given client ID
 */
class FetchAllCalculationPositionsForTheGivenClientId extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int         $clientId          Fetch all calculation positions for the given client ID
     * @param int|null    $projectId         Fetch all calculation positions for the given project ID
     * @param int|null    $subprojectId      Fetch all calculation positions for the given subproject ID
     * @param string|null $search            Fetch all calculation positions for the given search term
     * @param bool|null   $timeRecording     returns on valid time recording positions for the user
     * @param bool|null   $favoritesOnly     returns on favorite time recording positions for the user
     * @param bool|null   $withoutHourClosed returns only cp that are not closed for time recording
     * @param string|null $reeDate           return rest expenses estimation for the given calculation position
     *
     * Format: yyyymmdd OR dd.mm.yyyy OR current_date
     * @param int|null    $projectStatusId        Fetch all calculation positions for the given project status ID
     * @param bool|null   $bookKeeping            Fetch all calculation positions for the given book keeping
     * @param string|null $projectIds             Fetch all calculation positions for the given project IDs
     * @param string|null $issueTrackerProjectKey Fetch all calculation positions for the given issue tracker project key
     */
    public function __construct(
        protected int $clientId,
        protected ?int $projectId = null,
        protected ?int $subprojectId = null,
        protected ?string $search = null,
        protected ?bool $timeRecording = null,
        protected ?bool $favoritesOnly = null,
        protected ?bool $withoutHourClosed = null,
        protected ?string $reeDate = null,
        protected ?int $projectStatusId = null,
        protected ?bool $bookKeeping = null,
        protected ?string $projectIds = null,
        protected ?string $issueTrackerProjectKey = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/calculationPositions';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'clientId' => $this->clientId,
            'projectId' => $this->projectId,
            'subprojectId' => $this->subprojectId,
            'search' => $this->search,
            'timeRecording' => $this->timeRecording,
            'favoritesOnly' => $this->favoritesOnly,
            'withoutHourClosed' => $this->withoutHourClosed,
            'ree_date' => $this->reeDate,
            'projectStatusId' => $this->projectStatusId,
            'bookKeeping' => $this->bookKeeping,
            'projectIds' => $this->projectIds,
            'issueTrackerProjectKey' => $this->issueTrackerProjectKey,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
