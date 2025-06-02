# Troi API V2 PHP SDK

This package provides a PHP SDK for the Troi API V2, allowing developers to easily integrate Troi's services into their
applications. It is built
using [Troi's official OpenAPI specifications](https://dist.troi.software/troi/doc/api/v2-openapi.json) and is built
with the help of [crescat-io/saloon-sdk-generator](https://github.com/crescat-io/saloon-sdk-generator) tool.

## Installation

```bash
composer require mkaverin/troi-sdk-php
```

## Usage

```php
use Troi\V2\TroiSDK;

$connector = new TroiSDK(
    config('services.troi.customer'),
    config('services.troi.username'),
    config('services.troi.password'),
);

$response = $connector->clients()->fetchAllTenantsFormerlyClients();
```

Password is “API v2 / Troi App” token that can be found in the Troi security center

## Contributing

If you want to contribute to this SDK, you can generate the SDK from the fresh OpenAPI specification using the following
command:

```bash
php application build
```

## Links

- [Troi API V2 Documentation](https://v2.troi.dev)
- [Saloon library](https://docs.saloon.dev)
