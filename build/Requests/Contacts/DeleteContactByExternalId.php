<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Contacts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete contact by external ID.
 *
 * Delete contact by external ID
 */
class DeleteContactByExternalId extends Request
{
    protected Method $method = Method::DELETE;

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
