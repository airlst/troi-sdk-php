<?php

declare(strict_types=1);

namespace Troi\V2\SDKBuilder\Commands;

use Crescat\SaloonSdkGenerator\CodeGenerator;
use Crescat\SaloonSdkGenerator\Data\Generator\Config;
use Crescat\SaloonSdkGenerator\Data\Generator\GeneratedCode;
use Crescat\SaloonSdkGenerator\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use LaravelZero\Framework\Commands\Command;
use Nette\PhpGenerator\PhpFile;
use Troi\V2\SDKBuilder\Generators\ConnectorGenerator;
use Troi\V2\SDKBuilder\Generators\RequestGenerator;
use Troi\V2\SDKBuilder\Generators\ResourceGenerator;
use Troi\V2\SDKBuilder\Parsers\OpenApiParser;

use function base_path;
use function dirname;
use function file_exists;
use function file_get_contents;
use function file_put_contents;
use function is_null;
use function mkdir;
use function sprintf;
use function storage_path;
use function str_replace;

class Build extends Command
{
    protected const string NAMESPACE = 'Troi\V2';
    protected const string TYPE = 'openapi';
    protected $signature = 'build {spec-url=https://dist.troi.software/troi/doc/api/v2-openapi.json} {--no-download}';
    protected $description = 'Build an SDK';

    public function handle(): void
    {
        $specFile = storage_path('v2-openapi.json');

        if ($this->option('no-download') === false) {
            if (filter_var($this->argument('spec-url'), FILTER_VALIDATE_URL) === false) {
                $this->error('Invalid specification URL provided.');

                return;
            }

            $spec = file_get_contents($this->argument('spec-url')); // @phpstan-ignore-line

            if ($spec === false) {
                $this->error('Failed to read the specification file.');

                return;
            }

            file_put_contents($specFile, $spec);
        }

        if (! file_exists($specFile)) {
            $this->error('Specification file does not exist');

            return;
        }

        $config = new Config(
            'TroiSDK',
            self::NAMESPACE,
            // ignoredQueryParams: ['after', 'order_by', 'per_page'],
        );

        $generator = new CodeGenerator(
            $config,
            requestGenerator: new RequestGenerator($config),
            resourceGenerator: new ResourceGenerator($config),
            connectorGenerator: new ConnectorGenerator($config),
        );

        Factory::registerParser(self::TYPE, OpenApiParser::class);

        $this->dumpGeneratedFiles($generator->run(Factory::parse(self::TYPE, $specFile)));
    }

    protected function dumpGeneratedFiles(GeneratedCode $result): void
    {
        $this->title('Generated Files');

        $this->comment("\nConnector:");
        if (! is_null($result->connectorClass)) {
            $this->dumpToFile($result->connectorClass);
        }

        $this->comment("\nBase Resource:");
        if ($result->resourceBaseClass instanceof PhpFile) {
            $this->dumpToFile($result->resourceBaseClass);
        }

        $this->comment("\nResources:");
        foreach ($result->resourceClasses as $resourceClass) {
            $this->dumpToFile($resourceClass);
        }

        $this->comment("\nRequests:");
        foreach ($result->requestClasses as $requestClass) {
            $this->dumpToFile($requestClass);
        }
    }

    protected function dumpToFile(PhpFile $file): void
    {
        $wip = sprintf(
            '%s/%s/%s.php',
            base_path('build'),
            str_replace(self::NAMESPACE, '', Arr::first($file->getNamespaces())->getName()), // @phpstan-ignore-line
            Arr::first($file->getClasses())->getName(), // @phpstan-ignore-line
        );

        $filePath = Str::of($wip)->replace('\\', '/')->replace('//', '/')->toString();

        if (! file_exists(dirname($filePath))) {
            mkdir(dirname($filePath), recursive: true);
        }

        $ok = file_put_contents($filePath, (string) $file);

        if ($ok === false) {
            $this->error("- Failed to write: {$filePath}");
        } else {
            $this->line("- Created: {$filePath}");
        }
    }
}
