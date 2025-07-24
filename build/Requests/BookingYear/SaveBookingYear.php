<?php

declare(strict_types=1);

namespace Troi\V2\Requests\BookingYear;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

use function is_null;

/**
 * Save Booking Year.
 *
 * Save Booking Year
 */
class SaveBookingYear extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected ?int $year = null,
        protected ?array $client = null,
        protected ?bool $isActive = null,
        protected ?bool $isCurrent = null,
        protected ?int $id = null,
        protected ?string $path = null,
        protected ?string $etag = null,
        protected ?bool $isDeleted = null,
        protected ?string $className = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/bookingYears';
    }

    public function defaultBody(): array
    {
        return array_filter([
            'Year' => $this->year,
            'Client' => $this->client,
            'IsActive' => $this->isActive,
            'IsCurrent' => $this->isCurrent,
            'id' => $this->id,
            'Path' => $this->path,
            'ETag' => $this->etag,
            'IsDeleted' => $this->isDeleted,
            'ClassName' => $this->className,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
