<?php

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

use Troi\V2\SDKBuilder\Generators\ResourceGenerator;
use function base_path;
use function dirname;
use function file_exists;
use function file_get_contents;
use function file_put_contents;
use function mkdir;
use function sprintf;
use function str_replace;

class Build extends Command
{
    protected $signature = 'build {spec-url=https://dist.troi.software/troi/doc/api/v2-openapi.json} {--no-download}';
    protected $description = 'Build an SDK';

    protected const string NAMESPACE = 'Troi\V2';

    public function handle(): void
    {
        $specFile = base_path('v2-openapi.json');

        if (! $this->option('no-download')) {
            $spec = file_get_contents($this->argument('spec-url'));

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
            ignoredQueryParams: ['after', 'order_by', 'per_page'],
        );

        $generator = new CodeGenerator(
            $config,
            resourceGenerator: new ResourceGenerator($config),
            connectorGenerator: new ConnectorGenerator($config),
        );

        $this->dumpGeneratedFiles($generator->run(Factory::parse('openapi', $specFile)));
    }

    protected function dumpGeneratedFiles(GeneratedCode $result): void
    {
        $this->title('Generated Files');

        $this->comment("\nConnector:");
        if ($result->connectorClass) {
            $this->dumpToFile($result->connectorClass);
        }

        $this->comment("\nBase Resource:");
        if ($result->resourceBaseClass) {
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
            str_replace(self::NAMESPACE, '', Arr::first($file->getNamespaces())->getName()),
            Arr::first($file->getClasses())->getName(),
        );

        $filePath = Str::of($wip)->replace('\\', '/')->replace('//', '/')->toString();

        if (! file_exists(dirname($filePath))) {
            mkdir(dirname($filePath), recursive: true);
        }

        $ok = file_put_contents($filePath, (string)$file);

        if ($ok === false) {
            $this->error("- Failed to write: $filePath");
        } else {
            $this->line("- Created: $filePath");
        }
    }
}
