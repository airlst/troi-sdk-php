<?php

declare(strict_types=1);

namespace Troi\V2\Requests\BookingYear;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch all Booking Years for the given client ID.
 *
 * Fetch all Booking Years for the given client ID
 */
class FetchAllBookingYearsForTheGivenClientId extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $clientId Fetch all Booking Years for the given client ID
     */
    public function __construct(
        protected int $clientId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/bookingYears';
    }

    protected function defaultQuery(): array
    {
        return ['clientId' => $this->clientId];
    }
}
