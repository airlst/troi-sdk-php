<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Accounts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete Account.
 *
 * Delete Account
 */
class DeleteAccount extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param int $id Account id
     */
    public function __construct(
        protected int $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/accounts/{$this->id}";
    }
}
