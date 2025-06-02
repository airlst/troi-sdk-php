<?php

namespace Troi\V2\Requests\AccountGroups;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update Account Groups Object
 *
 * Update Account Groups Object
 */
class UpdateAccountGroupsObject extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/accountGroups/{$this->id}";
	}


	/**
	 * @param int $id Account group id
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
