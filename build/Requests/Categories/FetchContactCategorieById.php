<?php

namespace Troi\V2\Requests\Categories;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch contact categorie by ID
 *
 * Fetch contact categorie by ID
 */
class FetchContactCategorieById extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/contactCategories/{$this->id}";
	}


	/**
	 * @param int $id Fetch contact categorie by ID
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
