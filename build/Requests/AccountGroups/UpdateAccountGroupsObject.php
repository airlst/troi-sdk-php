<?php

declare(strict_types=1);

namespace Troi\V2\Requests\AccountGroups;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update Account Groups Object.
 *
 * Update Account Groups Object
 */
class UpdateAccountGroupsObject extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $id Account group id
     */
    public function __construct(
        protected int $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/accountGroups/{$this->id}";
    }
}
