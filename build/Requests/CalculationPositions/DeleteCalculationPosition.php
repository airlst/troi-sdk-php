<?php

declare(strict_types=1);

namespace Troi\V2\Requests\CalculationPositions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete calculation position.
 *
 * Delete calculation position
 */
class DeleteCalculationPosition extends Request
{
    protected Method $method = Method::DELETE;

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
