<?php

declare(strict_types=1);

namespace Troi\V2\Resource;

use Saloon\Http\Response;
use Troi\V2\Requests\Clients\FetchAllTenantsFormerlyClients;
use Troi\V2\Requests\Clients\FetchClientForTheGivenClientId;
use Troi\V2\Resource;

class Clients extends Resource
{
    public function fetchAllTenantsFormerlyClients(): Response
    {
        return $this->connector->send(new FetchAllTenantsFormerlyClients());
    }

    /**
     * @param int $id Fetch client for the given client ID
     */
    public function fetchClientForTheGivenClientId(int $id): Response
    {
        return $this->connector->send(new FetchClientForTheGivenClientId($id));
    }
}
