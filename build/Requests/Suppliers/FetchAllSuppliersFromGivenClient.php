<?php

namespace Troi\V2\Requests\Suppliers;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch all suppliers from given client
 *
 * Fetch all suppliers from given client
 */
class FetchAllSuppliersFromGivenClient extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/suppliers";
	}


	/**
	 * @param int $clientId Client ID
	 * @param null|bool $returnApiSyncItems Fetch all suppliers for the given client ID and return them as syncItems
	 * @param null|string $search Fetch all suppliers for the given search term
	 * @param null|bool $isActive Fetch all active suppliers
	 * @param null|bool $showReferenceDetails Fetch all suppliers and return extended payment term array
	 */
	public function __construct(
		protected int $clientId,
		protected ?bool $returnApiSyncItems = null,
		protected ?string $search = null,
		protected ?bool $isActive = null,
		protected ?bool $showReferenceDetails = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'clientId' => $this->clientId,
			'returnApiSyncItems' => $this->returnApiSyncItems,
			'search' => $this->search,
			'isActive' => $this->isActive,
			'showReferenceDetails' => $this->showReferenceDetails,
		]);
	}
}
