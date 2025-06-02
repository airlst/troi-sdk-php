<?php

namespace Troi\V2\Requests\Contacts;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch contact by external ID
 *
 * Fetch contact by external ID
 */
class FetchContactByExternalId extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/contactsByExternalId/{$this->id}";
	}


	/**
	 * @param int $id external contact ID
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
