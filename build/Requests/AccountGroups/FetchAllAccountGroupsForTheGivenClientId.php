<?php

declare(strict_types=1);

namespace Troi\V2\Requests\AccountGroups;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch all account groups for the given clientId.
 *
 * Fetch all account groups for the given clientId
 */
class FetchAllAccountGroupsForTheGivenClientId extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $clientId Client ID
     */
    public function __construct(
        protected int $clientId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/accountGroups';
    }

    protected function defaultQuery(): array
    {
        return ['clientId' => $this->clientId];
    }
}
