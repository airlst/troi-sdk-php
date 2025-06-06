<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Billing;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Save Billing.
 *
 * Save Billing
 */
class SaveBilling extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct() {}

    public function resolveEndpoint(): string
    {
        return '/billings/hours';
    }
}
