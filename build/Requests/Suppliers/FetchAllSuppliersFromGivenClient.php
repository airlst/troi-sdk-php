<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Suppliers;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch all suppliers from given client.
 *
 * Fetch all suppliers from given client
 */
class FetchAllSuppliersFromGivenClient extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int         $clientId             Client ID
     * @param bool|null   $returnApiSyncItems   Fetch all suppliers for the given client ID and return them as syncItems
     * @param string|null $search               Fetch all suppliers for the given search term
     * @param bool|null   $isActive             Fetch all active suppliers
     * @param bool|null   $showReferenceDetails Fetch all suppliers and return extended payment term array
     */
    public function __construct(
        protected int $clientId,
        protected ?bool $returnApiSyncItems = null,
        protected ?string $search = null,
        protected ?bool $isActive = null,
        protected ?bool $showReferenceDetails = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/suppliers';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'clientId' => $this->clientId,
            'returnApiSyncItems' => $this->returnApiSyncItems,
            'search' => $this->search,
            'isActive' => $this->isActive,
            'showReferenceDetails' => $this->showReferenceDetails,
        ]);
    }
}
