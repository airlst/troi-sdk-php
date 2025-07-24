<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Billing;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * Fetch all billings for the given parameter.
 *
 * Fetch all billings for the given parameter
 */
class FetchAllBillingsForTheGivenParameter extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int         $clientId              employeeId or calculationPositionId or projectId or subprojectId or startDate+endDate is mandatory
     * @param int|null    $calculationPositionId Fetch all billings for the given calculation position ID
     * @param int|null    $projectId             Fetch all billings for the given project ID
     * @param int|null    $subprojectId          Fetch all billings for the given subproject ID
     * @param string|null $startDate             Fetch all billings for the given start date
     * @param string|null $endDate               Fetch all billings for the given end date
     * @param bool|null   $extendedObject        extended object contains the full calculation position display path
     * @param bool|null   $fillsyncitems         Fetch all billings and fill the empty objects if there are any
     */
    public function __construct(
        protected int $clientId,
        protected ?int $calculationPositionId = null,
        protected ?int $projectId = null,
        protected ?int $subprojectId = null,
        protected ?string $startDate = null,
        protected ?string $endDate = null,
        protected ?bool $extendedObject = null,
        protected ?bool $fillsyncitems = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/billings/hours';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'clientId' => $this->clientId,
            'calculationPositionId' => $this->calculationPositionId,
            'projectId' => $this->projectId,
            'subprojectId' => $this->subprojectId,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'extendedObject' => $this->extendedObject,
            'fillsyncitems' => $this->fillsyncitems,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
