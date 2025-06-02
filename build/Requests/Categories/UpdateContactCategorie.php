<?php

namespace Troi\V2\Requests\Categories;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update contact categorie
 *
 * Update contact categorie
 */
class UpdateContactCategorie extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/contactCategories/{$this->id}";
	}


	/**
	 * @param int $id Contact categorie ID
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
