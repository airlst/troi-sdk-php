<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Absences;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Save Absence object.
 *
 * Save Absence object
 */
class SaveAbsenceObject extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct() {}

    public function resolveEndpoint(): string
    {
        return '/absences';
    }
}
