<?php

declare(strict_types=1);

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
     * @param int  $clientId Client ID
     * @param bool $syncItem Fetch all customers for the given client ID and return them as syncItems
     * @param bool $isActive Fetch all active customers. If omitted, all customers are returned.
     */
    public function fetchAllCustomersForTheGivenClientId(
        int $clientId,
        ?bool $syncItem = null,
        ?bool $isActive = null,
    ): Response {
        return $this->connector->send(new FetchAllCustomersForTheGivenClientId($clientId, $syncItem, $isActive));
    }

    /**
     * @param string $path /customers/1
     */
    public function saveCustomer(
        ?array $client = null,
        ?array $debitor = null,
        ?array $taxRate = null,
        ?int $taxRateDisplayMode = null,
        ?array $paymentTerm = null,
        ?bool $isActive = null,
        ?array $contact = null,
        ?string $shortcut = null,
        ?string $number = null,
        ?string $vatNumber = null,
        ?string $taxNumber = null,
        ?string $name = null,
        ?string $customerDefaultEmail = null,
        ?string $fileShareName = null,
        ?string $id = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new SaveCustomer($client, $debitor, $taxRate, $taxRateDisplayMode, $paymentTerm, $isActive, $contact, $shortcut, $number, $vatNumber, $taxNumber, $name, $customerDefaultEmail, $fileShareName, $id, $path, $etag, $isDeleted, $className));
    }

    /**
     * @param int $id Fetch customer for the given customer ID
     */
    public function fetchCustomerForTheGivenCustomerId(int $id): Response
    {
        return $this->connector->send(new FetchCustomerForTheGivenCustomerId($id));
    }

    /**
     * @param int    $id   Customer ID
     * @param string $path /customers/1
     */
    public function updateCustomer(
        int $id,
        ?array $client = null,
        ?array $debitor = null,
        ?array $taxRate = null,
        ?int $taxRateDisplayMode = null,
        ?array $paymentTerm = null,
        ?bool $isActive = null,
        ?array $contact = null,
        ?string $shortcut = null,
        ?string $number = null,
        ?string $vatNumber = null,
        ?string $taxNumber = null,
        ?string $name = null,
        ?string $customerDefaultEmail = null,
        ?string $fileShareName = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new UpdateCustomer($id, $client, $debitor, $taxRate, $taxRateDisplayMode, $paymentTerm, $isActive, $contact, $shortcut, $number, $vatNumber, $taxNumber, $name, $customerDefaultEmail, $fileShareName, $path, $etag, $isDeleted, $className));
    }
}
