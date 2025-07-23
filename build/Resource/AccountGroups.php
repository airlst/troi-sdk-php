<?php

declare(strict_types=1);

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

    public function saveAccountGroupsObject(
        ?string $name = null,
        ?array $client = null,
        ?int $type = null,
        ?int $id = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new SaveAccountGroupsObject($name, $client, $type, $id, $path, $etag, $isDeleted, $className));
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
    public function updateAccountGroupsObject(
        int $id,
        ?string $name = null,
        ?array $client = null,
        ?int $type = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new UpdateAccountGroupsObject($id, $name, $client, $type, $path, $etag, $isDeleted, $className));
    }

    /**
     * @param int $id Account Group id
     */
    public function deleteAbsenceGroups(int $id): Response
    {
        return $this->connector->send(new DeleteAbsenceGroups($id));
    }
}
