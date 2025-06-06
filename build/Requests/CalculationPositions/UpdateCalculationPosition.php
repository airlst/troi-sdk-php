<?php

declare(strict_types=1);

namespace Troi\V2\Requests\CalculationPositions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update calculation position.
 *
 * Update calculation position
 */
class UpdateCalculationPosition extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $id Calculation position ID
     */
    public function __construct(
        protected int $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/calculationPositions/{$this->id}";
    }
}
