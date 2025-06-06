<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Accounts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update Account.
 *
 * Update Account
 */
class UpdateAccount extends Request
{
    protected Method $method = Method::PUT;

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
