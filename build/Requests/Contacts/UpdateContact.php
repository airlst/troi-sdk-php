<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Contacts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update contact.
 *
 * Update contact
 */
class UpdateContact extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $id Contact ID
     */
    public function __construct(
        protected int $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/contacts/{$this->id}";
    }
}
