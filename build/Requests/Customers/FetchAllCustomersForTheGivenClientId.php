<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Customers;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch all customers for the given client ID.
 *
 * Fetch all customers for the given client ID
 */
class FetchAllCustomersForTheGivenClientId extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int       $clientId Client ID
     * @param bool|null $syncItem Fetch all customers for the given client ID and return them as syncItems
     * @param bool|null $isActive Fetch all active customers. If omitted, all customers are returned.
     */
    public function __construct(
        protected int $clientId,
        protected ?bool $syncItem = null,
        protected ?bool $isActive = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/customers';
    }

    protected function defaultQuery(): array
    {
        return array_filter(['clientId' => $this->clientId, 'syncItem' => $this->syncItem, 'isActive' => $this->isActive]);
    }
}
