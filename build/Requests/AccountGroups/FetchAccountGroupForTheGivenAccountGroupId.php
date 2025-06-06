<?php

declare(strict_types=1);

namespace Troi\V2\Requests\AccountGroups;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch Account Group for the given Account Group ID.
 *
 * Fetch Account Group for the given Account Group ID
 */
class FetchAccountGroupForTheGivenAccountGroupId extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $id Account Group id
     */
    public function __construct(
        protected int $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/accountGroups/{$this->id}";
    }
}
