<?php

declare(strict_types=1);

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
     * @param int  $clientId            Fetch all Accounts for the given clientId
     * @param int  $accountGroupId      Fetch all Accounts for the given accountGroupId
     * @param bool $accountIsCashOrBank Fetch all Accounts for the given account_is_cash_or_bank flag
     */
    public function fetchAllAccountsForTheGivenClientId(
        int $clientId,
        ?int $accountGroupId = null,
        ?bool $accountIsCashOrBank = null,
    ): Response {
        return $this->connector->send(new FetchAllAccountsForTheGivenClientId($clientId, $accountGroupId, $accountIsCashOrBank));
    }

    public function saveAccount(
        ?string $name = null,
        ?int $number = null,
        ?array $client = null,
        ?array $defaultContraAccount = null,
        ?array $summaryAccount = null,
        ?bool $isActive = null,
        ?bool $isCashDeskAccount = null,
        ?bool $isBankAccount = null,
        ?bool $isAutomaticAccount = null,
        ?bool $isLockedForDatev = null,
        ?array $taxRate = null,
        ?array $accountGroup = null,
        ?int $id = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new SaveAccount($name, $number, $client, $defaultContraAccount, $summaryAccount, $isActive, $isCashDeskAccount, $isBankAccount, $isAutomaticAccount, $isLockedForDatev, $taxRate, $accountGroup, $id, $path, $etag, $isDeleted, $className));
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
    public function updateAccount(
        int $id,
        ?string $name = null,
        ?int $number = null,
        ?array $client = null,
        ?array $defaultContraAccount = null,
        ?array $summaryAccount = null,
        ?bool $isActive = null,
        ?bool $isCashDeskAccount = null,
        ?bool $isBankAccount = null,
        ?bool $isAutomaticAccount = null,
        ?bool $isLockedForDatev = null,
        ?array $taxRate = null,
        ?array $accountGroup = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new UpdateAccount($id, $name, $number, $client, $defaultContraAccount, $summaryAccount, $isActive, $isCashDeskAccount, $isBankAccount, $isAutomaticAccount, $isLockedForDatev, $taxRate, $accountGroup, $path, $etag, $isDeleted, $className));
    }

    /**
     * @param int $id Account id
     */
    public function deleteAccount(int $id): Response
    {
        return $this->connector->send(new DeleteAccount($id));
    }
}
