<?php

namespace Troi\V2\Requests\BookingYear;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete Booking Year
 *
 * Delete Booking Year
 */
class DeleteBookingYear extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/bookingYears/{$this->id}";
	}


	/**
	 * @param int $id Booking Year id
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
