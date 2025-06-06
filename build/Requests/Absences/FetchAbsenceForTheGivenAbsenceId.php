<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Absences;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch Absence for the given Absence ID.
 *
 * Fetch Absence for the given Absence ID
 */
class FetchAbsenceForTheGivenAbsenceId extends Request
{
    protected Method $method = Method::GET;

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
