<?php

namespace Troi\V2\Requests\Suppliers;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update supplier
 *
 * Update supplier
 */
class UpdateSupplier extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/suppliers/{$this->id}";
	}


	/**
	 * @param int $id Supplier ID
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
