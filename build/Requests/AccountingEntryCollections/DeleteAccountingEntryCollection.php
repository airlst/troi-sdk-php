<?php

namespace Troi\V2\Requests\AccountingEntryCollections;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete accounting entry collection
 *
 * Delete accounting entry collection
 */
class DeleteAccountingEntryCollection extends Request
{
	protected Method $method = Method::DELETE;


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
