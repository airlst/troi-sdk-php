<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Accounts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch all Accounts for the given clientId.
 *
 * Fetch all Accounts for the given clientId
 */
class FetchAllAccountsForTheGivenClientId extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int       $clientId            Fetch all Accounts for the given clientId
     * @param int|null  $accountGroupId      Fetch all Accounts for the given accountGroupId
     * @param bool|null $accountIsCashOrBank Fetch all Accounts for the given account_is_cash_or_bank flag
     */
    public function __construct(
        protected int $clientId,
        protected ?int $accountGroupId = null,
        protected ?bool $accountIsCashOrBank = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/accounts';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'clientId' => $this->clientId,
            'accountGroupId' => $this->accountGroupId,
            'account_is_cash_or_bank' => $this->accountIsCashOrBank,
        ]);
    }
}
