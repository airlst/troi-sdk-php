<?php

namespace Troi\V2\Requests\BookingYear;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch all Booking Years for the given client ID
 *
 * Fetch all Booking Years for the given client ID
 */
class FetchAllBookingYearsForTheGivenClientId extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/bookingYears";
	}


	/**
	 * @param int $clientId Fetch all Booking Years for the given client ID
	 */
	public function __construct(
		protected int $clientId,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['clientId' => $this->clientId]);
	}
}
