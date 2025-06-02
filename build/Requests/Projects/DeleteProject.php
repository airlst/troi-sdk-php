<?php

namespace Troi\V2\Requests\Projects;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete project
 *
 * Delete project
 */
class DeleteProject extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/projects/{$this->id}";
	}


	/**
	 * @param int $id Project ID
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
