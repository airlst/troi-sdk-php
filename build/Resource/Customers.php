<?php

namespace Troi\V2\Resource;

use Saloon\Http\Response;
use Troi\V2\Requests\Customers\FetchAllCustomersForTheGivenClientId;
use Troi\V2\Requests\Customers\FetchCustomerForTheGivenCustomerId;
use Troi\V2\Requests\Customers\SaveCustomer;
use Troi\V2\Requests\Customers\UpdateCustomer;
use Troi\V2\Resource;

class Customers extends Resource
{
	/**
	 * @param int $clientId Client ID
	 * @param bool $syncItem Fetch all customers for the given client ID and return them as syncItems
	 * @param bool $isActive Fetch all active customers. If omitted, all customers are returned.
	 */
	public function fetchAllCustomersForTheGivenClientId(
		int $clientId,
		?bool $syncItem = null,
		?bool $isActive = null,
	): Response
	{
		return $this->connector->send(new FetchAllCustomersForTheGivenClientId($clientId, $syncItem, $isActive));
	}


	public function saveCustomer(): Response
	{
		return $this->connector->send(new SaveCustomer());
	}


	/**
	 * @param int $id Fetch customer for the given customer ID
	 */
	public function fetchCustomerForTheGivenCustomerId(int $id): Response
	{
		return $this->connector->send(new FetchCustomerForTheGivenCustomerId($id));
	}


	/**
	 * @param int $id Customer ID
	 */
	public function updateCustomer(int $id): Response
	{
		return $this->connector->send(new UpdateCustomer($id));
	}
}
