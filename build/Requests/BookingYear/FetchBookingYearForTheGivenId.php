<?php

declare(strict_types=1);

namespace Troi\V2\Requests\BookingYear;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch Booking Year for the given ID.
 *
 * Fetch Booking Year for the given ID
 */
class FetchBookingYearForTheGivenId extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $id Fetch Billing for the given Billing ID
     */
    public function __construct(
        protected int $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/bookingYears/{$this->id}";
    }
}
