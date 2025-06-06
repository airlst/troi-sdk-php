<?php

declare(strict_types=1);

namespace Troi\V2\Requests\AccountingEntryCollections;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch accounting entry collection for the given accounting entry collection ID.
 *
 * Fetch accounting entry collection for the given accounting entry collection ID
 */
class FetchAccountingEntryCollectionForTheGivenAccountingEntryCollectionId extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $id Accounting entry collection id
     */
    public function __construct(
        protected int $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/accountingEntryCollections/{$this->id}";
    }
}
