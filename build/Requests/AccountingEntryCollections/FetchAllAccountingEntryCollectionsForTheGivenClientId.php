<?php

namespace Troi\V2\Requests\AccountingEntryCollections;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch all accounting entry collections for the given clientId
 *
 * Fetch all accounting entry collections for the given clientId
 */
class FetchAllAccountingEntryCollectionsForTheGivenClientId extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/accountingEntryCollections";
	}


	/**
	 * @param int $clientId Fetch all accounting entry collections for the given clientId
	 * @param null|int $type Fetch all accounting entry collections for the given type
	 * 0 = export collections
	 * 1 = import collections
	 * @param null|int $year Fetch all accounting entry collections for the given year
	 */
	public function __construct(
		protected int $clientId,
		protected ?int $type = null,
		protected ?int $year = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['clientId' => $this->clientId, 'type' => $this->type, 'year' => $this->year]);
	}
}
