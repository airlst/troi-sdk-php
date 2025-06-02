<?php

namespace Troi\V2\Resource;

use Saloon\Http\Response;
use Troi\V2\Requests\BookingYear\DeleteBookingYear;
use Troi\V2\Requests\BookingYear\FetchAllBookingYearsForTheGivenClientId;
use Troi\V2\Requests\BookingYear\FetchBookingYearForTheGivenId;
use Troi\V2\Requests\BookingYear\SaveBookingYear;
use Troi\V2\Requests\BookingYear\UpdateBookingYear;
use Troi\V2\Resource;

class BookingYear extends Resource
{
	/**
	 * @param int $clientId Fetch all Booking Years for the given client ID
	 */
	public function fetchAllBookingYearsForTheGivenClientId(int $clientId): Response
	{
		return $this->connector->send(new FetchAllBookingYearsForTheGivenClientId($clientId));
	}


	public function saveBookingYear(): Response
	{
		return $this->connector->send(new SaveBookingYear());
	}


	/**
	 * @param int $id Fetch Billing for the given Billing ID
	 */
	public function fetchBookingYearForTheGivenId(int $id): Response
	{
		return $this->connector->send(new FetchBookingYearForTheGivenId($id));
	}


	/**
	 * @param int $id Booking Year id
	 */
	public function updateBookingYear(int $id): Response
	{
		return $this->connector->send(new UpdateBookingYear($id));
	}


	/**
	 * @param int $id Booking Year id
	 */
	public function deleteBookingYear(int $id): Response
	{
		return $this->connector->send(new DeleteBookingYear($id));
	}
}
