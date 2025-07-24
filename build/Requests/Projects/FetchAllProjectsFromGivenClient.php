<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Projects;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * Fetch all projects from given client.
 *
 * Fetch all projects from given client
 */
class FetchAllProjectsFromGivenClient extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int         $clientId           Client ID
     * @param int|null    $from               Fetch all projects for the given client ID and start with given project ID, use togehter with "size"
     * @param int|null    $size               Fetch all projects for the given client ID and start with given project ID, use togehter with "from"
     * @param string|null $since              Fetch all projects for the given client ID and given date, only items modified since ETag will be returned
     * @param bool|null   $syncItem           Fetch all projects for the given client ID and set syncitems "true" to return ApiSyncItems
     * @param string|null $customerId         Fetch all projects for the given client ID and given customer ID
     * @param bool|null   $customerIsActive   Fetch all projects for the given client ID and given parameter, set to "true" to get only projects of active customers
     * @param bool|null   $projectIsInProcess Fetch all projects for the given client ID and given parameter, set to "true" to get only "in process" projects
     * @param mixed|null  $projectStatusId    Fetch all projects for the given client ID and given project status ID
     * @param mixed|null  $projectTypeId      Fetch all projects for the given client ID and given project type ID
     * @param int|null    $projectLeaderId    Fetch all projects for the given client ID and given leader ID
     * @param string|null $search             Fetch all projects for the given client ID and givenSearch Term
     * @param bool|null   $extendedObject     Fetch all projects for the given client ID and extend it with real objects instead of sync item
     */
    public function __construct(
        protected int $clientId,
        protected ?int $from = null,
        protected ?int $size = null,
        protected ?string $since = null,
        protected ?bool $syncItem = null,
        protected ?string $customerId = null,
        protected ?bool $customerIsActive = null,
        protected ?bool $projectIsInProcess = null,
        protected mixed $projectStatusId = null,
        protected mixed $projectTypeId = null,
        protected ?int $projectLeaderId = null,
        protected ?string $search = null,
        protected ?bool $extendedObject = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/projects';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'clientId' => $this->clientId,
            'from' => $this->from,
            'size' => $this->size,
            'since' => $this->since,
            'syncItem' => $this->syncItem,
            'customerId' => $this->customerId,
            'customerIsActive' => $this->customerIsActive,
            'projectIsInProcess' => $this->projectIsInProcess,
            'projectStatusId' => $this->projectStatusId,
            'projectTypeId' => $this->projectTypeId,
            'projectLeaderId' => $this->projectLeaderId,
            'search' => $this->search,
            'extendedObject' => $this->extendedObject,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
