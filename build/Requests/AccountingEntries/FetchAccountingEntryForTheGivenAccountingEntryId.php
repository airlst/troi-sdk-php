<?php

namespace Troi\V2\Requests\AccountingEntries;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch Accounting Entry for the given Accounting Entry ID
 *
 * Fetch Accounting Entry for the given Accounting Entry ID
 */
class FetchAccountingEntryForTheGivenAccountingEntryId extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/accountingEntries/{$this->id}";
	}


	/**
	 * @param int $id Accounting entry id
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
