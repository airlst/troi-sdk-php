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
        protected ?int $year = null,
        protected ?array $client = null,
        protected ?bool $isActive = null,
        protected ?bool $isCurrent = null,
        protected ?string $path = null,
        protected ?string $etag = null,
        protected ?bool $isDeleted = null,
        protected ?string $className = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/bookingYears/{$this->id}";
    }

    public function defaultBody(): array
    {
        return array_filter([
            'Year' => $this->year,
            'Client' => $this->client,
            'IsActive' => $this->isActive,
            'IsCurrent' => $this->isCurrent,
            'Path' => $this->path,
            'ETag' => $this->etag,
            'IsDeleted' => $this->isDeleted,
            'ClassName' => $this->className,
        ]);
    }
}
