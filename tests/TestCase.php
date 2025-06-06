<?php

declare(strict_types=1);

namespace Troi\V2\SDKBuilder\Tests;

use LaravelZero\Framework\Testing\TestCase as BaseTestCase;
use Override;
use Saloon\Config;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Troi\V2\TroiSDK;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected TroiSDK $connector;

    /**
     * @param array<string, string|int|float|bool> $headers
     */
    public function getMockClient(
        string $request,
        array $body = [],
        int $status = 200,
        array $headers = [],
    ): MockClient {
        return new MockClient([
            $request => MockResponse::make($body, $status, $headers),
        ]);
    }

    #[Override]
    protected function setUp(): void
    {
        parent::setUp();

        MockClient::destroyGlobal();
        Config::preventStrayRequests();

        $this->connector = new TroiSDK(
            'test-customer',
            'test-username',
            'test-password',
        );
    }
}
