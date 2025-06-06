<?php

declare(strict_types=1);

use Saloon\Http\Auth\BasicAuthenticator;
use Troi\V2\Requests\Clients\FetchAllTenantsFormerlyClients;
use Troi\V2\Resource\Clients;
use Troi\V2\TroiSDK;

/** @var Troi\V2\SDKBuilder\Tests\TestCase $this */
it('sets correct base URL', function (): void {
    expect($this->connector)->toBeInstanceOf(TroiSDK::class);
    expect($this->connector->resolveBaseUrl())->toBe('https://test-customer.troi.software/api/v2/rest');
});

it('handles auth', function (): void {
    $this->connector->withMockClient($this->getMockClient(FetchAllTenantsFormerlyClients::class));

    $resource = new Clients($this->connector);
    $resource->fetchAllTenantsFormerlyClients();

    $authenticator = $this->connector->getMockClient()->getLastPendingRequest()->getAuthenticator();

    expect($authenticator)->toBeInstanceOf(BasicAuthenticator::class);
    expect($authenticator->username)->toBe('test-username');
    expect($authenticator->password)->toBe('test-password');
});
