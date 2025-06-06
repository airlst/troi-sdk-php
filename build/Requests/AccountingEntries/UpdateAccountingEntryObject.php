<?php

declare(strict_types=1);

namespace Troi\V2\Requests\AccountingEntries;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update Accounting Entry Object.
 *
 * Update Accounting Entry Object
 */
class UpdateAccountingEntryObject extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $id Accounting entry id
     */
    public function __construct(
        protected int $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/accountingEntries/{$this->id}";
    }
}
