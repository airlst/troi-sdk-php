<?php

namespace Troi\V2\Requests\Contacts;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete contact
 *
 * Delete contact
 */
class DeleteContact extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/contacts/{$this->id}";
	}


	/**
	 * @param int $id Contact ID
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
