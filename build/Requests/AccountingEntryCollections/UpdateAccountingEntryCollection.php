<?php

namespace Troi\V2\Requests\AccountingEntryCollections;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update accounting entry collection
 *
 * Update accounting entry collection
 */
class UpdateAccountingEntryCollection extends Request
{
	protected Method $method = Method::PUT;


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
