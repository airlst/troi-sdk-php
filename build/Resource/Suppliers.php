<?php

namespace Troi\V2\Resource;

use Saloon\Http\Response;
use Troi\V2\Requests\Suppliers\FetchAllSuppliersFromGivenClient;
use Troi\V2\Requests\Suppliers\FetchSupplierForTheGivenSupplierId;
use Troi\V2\Requests\Suppliers\SaveSupplier;
use Troi\V2\Requests\Suppliers\UpdateSupplier;
use Troi\V2\Resource;

class Suppliers extends Resource
{
	/**
	 * @param int $clientId Client ID
	 * @param bool $returnApiSyncItems Fetch all suppliers for the given client ID and return them as syncItems
	 * @param string $search Fetch all suppliers for the given search term
	 * @param bool $isActive Fetch all active suppliers
	 * @param bool $showReferenceDetails Fetch all suppliers and return extended payment term array
	 */
	public function fetchAllSuppliersFromGivenClient(
		int $clientId,
		?bool $returnApiSyncItems,
		?string $search,
		?bool $isActive,
		?bool $showReferenceDetails,
	): Response
	{
		return $this->connector->send(new FetchAllSuppliersFromGivenClient($clientId, $returnApiSyncItems, $search, $isActive, $showReferenceDetails));
	}


	public function saveSupplier(): Response
	{
		return $this->connector->send(new SaveSupplier());
	}


	/**
	 * @param int $id Fetch supplier for the given supplier ID
	 */
	public function fetchSupplierForTheGivenSupplierId(int $id): Response
	{
		return $this->connector->send(new FetchSupplierForTheGivenSupplierId($id));
	}


	/**
	 * @param int $id Supplier ID
	 */
	public function updateSupplier(int $id): Response
	{
		return $this->connector->send(new UpdateSupplier($id));
	}
}
