<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Absences;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update Absence object.
 *
 * Update Absence object
 */
class UpdateAbsenceObject extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $id Absence id
     */
    public function __construct(
        protected int $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/absences/{$this->id}";
    }
}
