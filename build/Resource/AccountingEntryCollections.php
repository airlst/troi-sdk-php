<?php

declare(strict_types=1);

namespace Troi\V2\Resource;

use Saloon\Http\Response;
use Troi\V2\Requests\AccountingEntryCollections\DeleteAccountingEntryCollection;
use Troi\V2\Requests\AccountingEntryCollections\FetchAccountingEntryCollectionForTheGivenAccountingEntryCollectionId;
use Troi\V2\Requests\AccountingEntryCollections\FetchAllAccountingEntryCollectionsForTheGivenClientId;
use Troi\V2\Requests\AccountingEntryCollections\SaveAccountingEntryCollections;
use Troi\V2\Requests\AccountingEntryCollections\UpdateAccountingEntryCollection;
use Troi\V2\Resource;

class AccountingEntryCollections extends Resource
{
    /**
     * @param int $clientId Fetch all accounting entry collections for the given clientId
     * @param int $type     Fetch all accounting entry collections for the given type
     *                      0 = export collections
     *                      1 = import collections
     * @param int $year     Fetch all accounting entry collections for the given year
     */
    public function fetchAllAccountingEntryCollectionsForTheGivenClientId(
        int $clientId,
        ?int $type = null,
        ?int $year = null,
    ): Response {
        return $this->connector->send(new FetchAllAccountingEntryCollectionsForTheGivenClientId($clientId, $type, $year));
    }

    public function saveAccountingEntryCollections(
        ?array $client = null,
        ?string $fromDate = null,
        ?string $tillDate = null,
        ?bool $isLocked = null,
        ?array $createEmployee = null,
        ?string $createDate = null,
        ?int $type = null,
        ?int $id = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new SaveAccountingEntryCollections($client, $fromDate, $tillDate, $isLocked, $createEmployee, $createDate, $type, $id, $path, $etag, $isDeleted, $className));
    }

    /**
     * @param int $id Accounting entry collection id
     */
    public function fetchAccountingEntryCollectionForTheGivenAccountingEntryCollectionId(int $id): Response
    {
        return $this->connector->send(new FetchAccountingEntryCollectionForTheGivenAccountingEntryCollectionId($id));
    }

    /**
     * @param int $id Accounting entry collection id
     */
    public function updateAccountingEntryCollection(
        int $id,
        ?array $client = null,
        ?string $fromDate = null,
        ?string $tillDate = null,
        ?bool $isLocked = null,
        ?array $createEmployee = null,
        ?string $createDate = null,
        ?int $type = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new UpdateAccountingEntryCollection($id, $client, $fromDate, $tillDate, $isLocked, $createEmployee, $createDate, $type, $path, $etag, $isDeleted, $className));
    }

    /**
     * @param int $id Accounting entry collection id
     */
    public function deleteAccountingEntryCollection(int $id): Response
    {
        return $this->connector->send(new DeleteAccountingEntryCollection($id));
    }
}
