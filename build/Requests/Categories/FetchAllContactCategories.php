<?php

namespace Troi\V2\Requests\Categories;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch all contact categories
 *
 * Fetch all contact categories
 */
class FetchAllContactCategories extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/contactCategories";
	}


	/**
	 * @param null|int $contactId Fetch all contact categories for the given contact ID
	 * @param null|int $categoryId Fetch all contact categories for the given category ID
	 * @param null|int $size Fetch contact categories for the given size use together with "from"
	 * @param null|int $from Fetch contact category from the given ID use together with "size"
	 */
	public function __construct(
		protected ?int $contactId = null,
		protected ?int $categoryId = null,
		protected ?int $size = null,
		protected ?int $from = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['contactId' => $this->contactId, 'categoryId' => $this->categoryId, 'size' => $this->size, 'from' => $this->from]);
	}
}
