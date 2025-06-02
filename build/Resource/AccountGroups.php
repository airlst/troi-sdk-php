<?php

namespace Troi\V2\Resource;

use Saloon\Http\Response;
use Troi\V2\Requests\AccountGroups\DeleteAbsenceGroups;
use Troi\V2\Requests\AccountGroups\FetchAccountGroupForTheGivenAccountGroupId;
use Troi\V2\Requests\AccountGroups\FetchAllAccountGroupsForTheGivenClientId;
use Troi\V2\Requests\AccountGroups\SaveAccountGroupsObject;
use Troi\V2\Requests\AccountGroups\UpdateAccountGroupsObject;
use Troi\V2\Resource;

class AccountGroups extends Resource
{
	/**
	 * @param int $clientId Client ID
	 */
	public function fetchAllAccountGroupsForTheGivenClientId(int $clientId): Response
	{
		return $this->connector->send(new FetchAllAccountGroupsForTheGivenClientId($clientId));
	}


	public function saveAccountGroupsObject(): Response
	{
		return $this->connector->send(new SaveAccountGroupsObject());
	}


	/**
	 * @param int $id Account Group id
	 */
	public function fetchAccountGroupForTheGivenAccountGroupId(int $id): Response
	{
		return $this->connector->send(new FetchAccountGroupForTheGivenAccountGroupId($id));
	}


	/**
	 * @param int $id Account group id
	 */
	public function updateAccountGroupsObject(int $id): Response
	{
		return $this->connector->send(new UpdateAccountGroupsObject($id));
	}


	/**
	 * @param int $id Account Group id
	 */
	public function deleteAbsenceGroups(int $id): Response
	{
		return $this->connector->send(new DeleteAbsenceGroups($id));
	}
}
