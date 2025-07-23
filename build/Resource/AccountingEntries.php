<?php

declare(strict_types=1);

namespace Troi\V2\Resource;

use Saloon\Http\Response;
use Troi\V2\Requests\AccountingEntries\DeleteAccountingEntry;
use Troi\V2\Requests\AccountingEntries\FetchAccountingEntryForTheGivenAccountingEntryId;
use Troi\V2\Requests\AccountingEntries\FetchAllAccountingEntriesForTheGivenClientId;
use Troi\V2\Requests\AccountingEntries\SaveAccountingEntryObject;
use Troi\V2\Requests\AccountingEntries\UpdateAccountingEntryObject;
use Troi\V2\Resource;

class AccountingEntries extends Resource
{
    /**
     * @param int $clientId                    Client id
     * @param int $cpId                        Fetch all Accounting Entries for the given CalculationPosition ID
     * @param int $projectId                   Fetch all Accounting Entries for the given Project ID
     * @param int $accountingEntryCollectionId Fetch all Accounting Entries for the given AccountingEntryCollection ID
     */
    public function fetchAllAccountingEntriesForTheGivenClientId(
        int $clientId,
        ?int $cpId = null,
        ?int $projectId = null,
        ?int $accountingEntryCollectionId = null,
    ): Response {
        return $this->connector->send(new FetchAllAccountingEntriesForTheGivenClientId($clientId, $cpId, $projectId, $accountingEntryCollectionId));
    }

    public function saveAccountingEntryObject(
        ?array $client = null,
        ?array $costCenter = null,
        ?array $costCenter1 = null,
        ?array $costCenter2 = null,
        ?int $amount = null,
        ?array $account = null,
        ?array $contraAccount = null,
        ?array $accountingEntryCollection = null,
        ?string $documentDate = null,
        ?string $documentNumber = null,
        ?string $documentNumber2 = null,
        ?string $dmsLink = null,
        ?string $besrReferenceNumber = null,
        ?string $description = null,
        ?array $calculationPosition = null,
        ?array $taxRate = null,
        ?int $location = null,
        ?bool $isNotBillable = null,
        ?bool $isBilled = null,
        ?bool $isPaid = null,
        ?bool $isKsk = null,
        ?bool $isSplitBase = null,
        ?int $parentId = null,
        ?array $paymentTerm = null,
        ?string $projectNumber = null,
        ?int $id = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new SaveAccountingEntryObject($client, $costCenter, $costCenter1, $costCenter2, $amount, $account, $contraAccount, $accountingEntryCollection, $documentDate, $documentNumber, $documentNumber2, $dmsLink, $besrReferenceNumber, $description, $calculationPosition, $taxRate, $location, $isNotBillable, $isBilled, $isPaid, $isKsk, $isSplitBase, $parentId, $paymentTerm, $projectNumber, $id, $path, $etag, $isDeleted, $className));
    }

    /**
     * @param int $id Accounting entry id
     */
    public function fetchAccountingEntryForTheGivenAccountingEntryId(int $id): Response
    {
        return $this->connector->send(new FetchAccountingEntryForTheGivenAccountingEntryId($id));
    }

    /**
     * @param int $id Accounting entry id
     */
    public function updateAccountingEntryObject(
        int $id,
        ?array $client = null,
        ?array $costCenter = null,
        ?array $costCenter1 = null,
        ?array $costCenter2 = null,
        ?int $amount = null,
        ?array $account = null,
        ?array $contraAccount = null,
        ?array $accountingEntryCollection = null,
        ?string $documentDate = null,
        ?string $documentNumber = null,
        ?string $documentNumber2 = null,
        ?string $dmsLink = null,
        ?string $besrReferenceNumber = null,
        ?string $description = null,
        ?array $calculationPosition = null,
        ?array $taxRate = null,
        ?int $location = null,
        ?bool $isNotBillable = null,
        ?bool $isBilled = null,
        ?bool $isPaid = null,
        ?bool $isKsk = null,
        ?bool $isSplitBase = null,
        ?int $parentId = null,
        ?array $paymentTerm = null,
        ?string $projectNumber = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new UpdateAccountingEntryObject($id, $client, $costCenter, $costCenter1, $costCenter2, $amount, $account, $contraAccount, $accountingEntryCollection, $documentDate, $documentNumber, $documentNumber2, $dmsLink, $besrReferenceNumber, $description, $calculationPosition, $taxRate, $location, $isNotBillable, $isBilled, $isPaid, $isKsk, $isSplitBase, $parentId, $paymentTerm, $projectNumber, $path, $etag, $isDeleted, $className));
    }

    /**
     * @param int $id Accounting entry id
     */
    public function deleteAccountingEntry(int $id): Response
    {
        return $this->connector->send(new DeleteAccountingEntry($id));
    }
}
