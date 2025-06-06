<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Billing;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update Billing.
 *
 * Update Billing
 */
class UpdateBilling extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $id Billing id
     */
    public function __construct(
        protected int $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/billings/hours/{$this->id}";
    }
}
