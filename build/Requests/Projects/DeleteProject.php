<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Projects;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete project.
 *
 * Delete project
 */
class DeleteProject extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param int $id Project ID
     */
    public function __construct(
        protected int $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/projects/{$this->id}";
    }
}
