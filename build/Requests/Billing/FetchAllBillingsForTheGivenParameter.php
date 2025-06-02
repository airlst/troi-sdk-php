<?php

namespace Troi\V2\Requests\Billing;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch all billings for the given parameter
 *
 * Fetch all billings for the given parameter
 */
class FetchAllBillingsForTheGivenParameter extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/billings/hours";
	}


	/**
	 * @param int $clientId employeeId or calculationPositionId or projectId or subprojectId or startDate+endDate is mandatory
	 * @param null|int $calculationPositionId Fetch all billings for the given calculation position ID
	 * @param null|int $projectId Fetch all billings for the given project ID
	 * @param null|int $subprojectId Fetch all billings for the given subproject ID
	 * @param null|string $startDate Fetch all billings for the given start date
	 * @param null|string $endDate Fetch all billings for the given end date
	 * @param null|bool $extendedObject extended object contains the full calculation position display path
	 * @param null|bool $fillsyncitems Fetch all billings and fill the empty objects if there are any
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
	) {
	}


	public function defaultQuery(): array
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
		]);
	}
}
