<?php

declare(strict_types=1);

namespace Troi\V2\Requests\AccountGroups;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete Absence Groups.
 *
 * Delete Absence Groups
 */
class DeleteAbsenceGroups extends Request
{
    protected Method $method = Method::DELETE;

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
