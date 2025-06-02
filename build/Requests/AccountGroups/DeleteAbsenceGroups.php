<?php

namespace Troi\V2\Requests\AccountGroups;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete Absence Groups
 *
 * Delete Absence Groups
 */
class DeleteAbsenceGroups extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/accountGroups/{$this->id}";
	}


	/**
	 * @param int $id Account Group id
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
