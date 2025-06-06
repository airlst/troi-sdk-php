<?php

declare(strict_types=1);

namespace Troi\V2\Requests\BookingYear;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update Booking Year.
 *
 * Update Booking Year
 */
class UpdateBookingYear extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $id Booking Year id
     */
    public function __construct(
        protected int $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/bookingYears/{$this->id}";
    }
}
