<?php

namespace Troi\V2\Resource;

use Saloon\Http\Response;
use Troi\V2\Requests\Accounts\DeleteAccount;
use Troi\V2\Requests\Accounts\FetchAccountGivenAccountId;
use Troi\V2\Requests\Accounts\FetchAllAccountsForTheGivenClientId;
use Troi\V2\Requests\Accounts\SaveAccount;
use Troi\V2\Requests\Accounts\UpdateAccount;
use Troi\V2\Resource;

class Accounts extends Resource
{
	/**
	 * @param int $clientId Fetch all Accounts for the given clientId
	 * @param int $accountGroupId Fetch all Accounts for the given accountGroupId
	 * @param bool $accountIsCashOrBank Fetch all Accounts for the given account_is_cash_or_bank flag
	 */
	public function fetchAllAccountsForTheGivenClientId(
		int $clientId,
		?int $accountGroupId,
		?bool $accountIsCashOrBank,
	): Response
	{
		return $this->connector->send(new FetchAllAccountsForTheGivenClientId($clientId, $accountGroupId, $accountIsCashOrBank));
	}


	public function saveAccount(): Response
	{
		return $this->connector->send(new SaveAccount());
	}


	/**
	 * @param int $id Account id
	 */
	public function fetchAccountGivenAccountId(int $id): Response
	{
		return $this->connector->send(new FetchAccountGivenAccountId($id));
	}


	/**
	 * @param int $id Account id
	 */
	public function updateAccount(int $id): Response
	{
		return $this->connector->send(new UpdateAccount($id));
	}


	/**
	 * @param int $id Account id
	 */
	public function deleteAccount(int $id): Response
	{
		return $this->connector->send(new DeleteAccount($id));
	}
}
