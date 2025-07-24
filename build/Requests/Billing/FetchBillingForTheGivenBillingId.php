<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Billing;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * Fetch Billing for the given Billing ID.
 *
 * Fetch Billing for the given Billing ID
 */
class FetchBillingForTheGivenBillingId extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int       $id             Fetch Billing for the given Billing ID
     * @param bool|null $extendedObject extended object contains the full calculation position display path
     */
    public function __construct(
        protected int $id,
        protected ?bool $extendedObject = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/billings/hours/{$this->id}";
    }

    protected function defaultQuery(): array
    {
        return array_filter(['extendedObject' => $this->extendedObject], fn (mixed $value): bool => ! is_null($value));
    }
}
