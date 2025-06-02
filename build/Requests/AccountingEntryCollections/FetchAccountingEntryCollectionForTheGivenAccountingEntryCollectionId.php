<?php

namespace Troi\V2\Requests\AccountingEntryCollections;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch accounting entry collection for the given accounting entry collection ID
 *
 * Fetch accounting entry collection for the given accounting entry collection ID
 */
class FetchAccountingEntryCollectionForTheGivenAccountingEntryCollectionId extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/accountingEntryCollections/{$this->id}";
	}


	/**
	 * @param int $id Accounting entry collection id
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
