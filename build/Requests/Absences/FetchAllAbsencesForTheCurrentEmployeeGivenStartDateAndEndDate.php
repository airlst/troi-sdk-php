<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Absences;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * Fetch all absences for the current employee given Start Date and End Date.
 *
 * Fetch all absences for the current employee given Start Date and End Date
 */
class FetchAllAbsencesForTheCurrentEmployeeGivenStartDateAndEndDate extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int      $start      Start date
     * @param int      $end        End date
     * @param int|null $employeeId Employee id
     */
    public function __construct(
        protected int $start,
        protected int $end,
        protected ?int $employeeId = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/absences';
    }

    protected function defaultQuery(): array
    {
        return array_filter(['start' => $this->start, 'end' => $this->end, 'employeeId' => $this->employeeId], fn (mixed $value): bool => ! is_null($value));
    }
}
