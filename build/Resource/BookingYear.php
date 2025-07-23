<?php

declare(strict_types=1);

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

    public function saveBookingYear(
        ?int $year = null,
        ?array $client = null,
        ?bool $isActive = null,
        ?bool $isCurrent = null,
        ?int $id = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new SaveBookingYear($year, $client, $isActive, $isCurrent, $id, $path, $etag, $isDeleted, $className));
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
    public function updateBookingYear(
        int $id,
        ?int $year = null,
        ?array $client = null,
        ?bool $isActive = null,
        ?bool $isCurrent = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new UpdateBookingYear($id, $year, $client, $isActive, $isCurrent, $path, $etag, $isDeleted, $className));
    }

    /**
     * @param int $id Booking Year id
     */
    public function deleteBookingYear(int $id): Response
    {
        return $this->connector->send(new DeleteBookingYear($id));
    }
}
