<?php

namespace Troi\V2\Requests\AccountingEntries;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Save Accounting Entry Object
 *
 * Save Accounting Entry Object
 */
class SaveAccountingEntryObject extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/accountingEntries";
	}


	public function __construct()
	{
	}
}
