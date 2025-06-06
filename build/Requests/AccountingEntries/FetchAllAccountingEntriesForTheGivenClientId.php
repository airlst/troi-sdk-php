<?php

declare(strict_types=1);

namespace Troi\V2\Requests\AccountingEntries;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch all Accounting Entries for the given clientId.
 *
 * Fetch all Accounting Entries for the given clientId
 */
class FetchAllAccountingEntriesForTheGivenClientId extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int      $clientId                    Client id
     * @param int|null $cpId                        Fetch all Accounting Entries for the given CalculationPosition ID
     * @param int|null $projectId                   Fetch all Accounting Entries for the given Project ID
     * @param int|null $accountingEntryCollectionId Fetch all Accounting Entries for the given AccountingEntryCollection ID
     */
    public function __construct(
        protected int $clientId,
        protected ?int $cpId = null,
        protected ?int $projectId = null,
        protected ?int $accountingEntryCollectionId = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/accountingEntries';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'clientId' => $this->clientId,
            'cpId' => $this->cpId,
            'projectId' => $this->projectId,
            'accountingEntryCollectionId' => $this->accountingEntryCollectionId,
        ]);
    }
}
