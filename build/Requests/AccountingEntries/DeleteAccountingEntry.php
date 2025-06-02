<?php

namespace Troi\V2\Requests\AccountingEntries;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete Accounting Entry
 *
 * Delete Accounting Entry
 */
class DeleteAccountingEntry extends Request
{
	protected Method $method = Method::DELETE;


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
