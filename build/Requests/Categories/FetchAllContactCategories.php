<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Categories;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * Fetch all contact categories.
 *
 * Fetch all contact categories
 */
class FetchAllContactCategories extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int|null $contactId  Fetch all contact categories for the given contact ID
     * @param int|null $categoryId Fetch all contact categories for the given category ID
     * @param int|null $size       Fetch contact categories for the given size use together with "from"
     * @param int|null $from       Fetch contact category from the given ID use together with "size"
     */
    public function __construct(
        protected ?int $contactId = null,
        protected ?int $categoryId = null,
        protected ?int $size = null,
        protected ?int $from = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/contactCategories';
    }

    protected function defaultQuery(): array
    {
        return array_filter(['contactId' => $this->contactId, 'categoryId' => $this->categoryId, 'size' => $this->size, 'from' => $this->from], fn (mixed $value): bool => ! is_null($value));
    }
}
