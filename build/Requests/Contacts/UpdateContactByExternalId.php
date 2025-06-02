<?php

namespace Troi\V2\Requests\Contacts;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update contact by external ID
 *
 * Update contact by external ID
 */
class UpdateContactByExternalId extends Request
{
	protected Method $method = Method::PUT;


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
