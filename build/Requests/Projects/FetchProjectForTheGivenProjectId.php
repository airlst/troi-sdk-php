<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Projects;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch project for the given project ID.
 *
 * Fetch project for the given project ID
 */
class FetchProjectForTheGivenProjectId extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $id Fetch project for the project ID
     */
    public function __construct(
        protected int $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/projects/{$this->id}";
    }
}
