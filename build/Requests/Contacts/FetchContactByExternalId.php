<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Contacts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch contact by external ID.
 *
 * Fetch contact by external ID
 */
class FetchContactByExternalId extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $id external contact ID
     */
    public function __construct(
        protected int $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/contactsByExternalId/{$this->id}";
    }
}
