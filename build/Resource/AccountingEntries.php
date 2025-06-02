<?php

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
	 * @param int $clientId Client id
	 * @param int $cpId Fetch all Accounting Entries for the given CalculationPosition ID
	 * @param int $projectId Fetch all Accounting Entries for the given Project ID
	 * @param int $accountingEntryCollectionId Fetch all Accounting Entries for the given AccountingEntryCollection ID
	 */
	public function fetchAllAccountingEntriesForTheGivenClientId(
		int $clientId,
		?int $cpId,
		?int $projectId,
		?int $accountingEntryCollectionId,
	): Response
	{
		return $this->connector->send(new FetchAllAccountingEntriesForTheGivenClientId($clientId, $cpId, $projectId, $accountingEntryCollectionId));
	}


	public function saveAccountingEntryObject(): Response
	{
		return $this->connector->send(new SaveAccountingEntryObject());
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
	public function updateAccountingEntryObject(int $id): Response
	{
		return $this->connector->send(new UpdateAccountingEntryObject($id));
	}


	/**
	 * @param int $id Accounting entry id
	 */
	public function deleteAccountingEntry(int $id): Response
	{
		return $this->connector->send(new DeleteAccountingEntry($id));
	}
}
