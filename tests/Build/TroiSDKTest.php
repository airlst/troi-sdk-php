<?php

use Troi\V2\TroiSDK;

it('sets correct base URL', function () {
    $connector = new TroiSDK('some-customer');

    expect($connector)->toBeInstanceOf(TroiSDK::class);
    expect($connector->resolveBaseUrl())->toBe('https://some-customer.troi.software/api/v2/rest');
});

it('handles auth', function () {
    $connector = new TroiSDK(
        config('services.troi.customer'),
        config('services.troi.username'),
        config('services.troi.password'),
    );

    $response = $connector->clients()->fetchAllTenantsFormerlyClients();

    expect($response->status())->toBe(200);
    expect($response->body())->toBeJson();
    expect($response->json())->toBeArray();
});
