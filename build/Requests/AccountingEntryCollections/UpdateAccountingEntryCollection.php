<?php

declare(strict_types=1);

namespace Troi\V2\Requests\AccountingEntryCollections;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update accounting entry collection.
 *
 * Update accounting entry collection
 */
class UpdateAccountingEntryCollection extends Request
{
    protected Method $method = Method::PUT;

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
