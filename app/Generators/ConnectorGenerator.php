<?php

declare(strict_types=1);

namespace Troi\V2\SDKBuilder\Generators;

use Crescat\SaloonSdkGenerator\Data\Generator\ApiSpecification;
use Crescat\SaloonSdkGenerator\Data\Generator\Endpoint;
use Crescat\SaloonSdkGenerator\Generator;
use Crescat\SaloonSdkGenerator\Helpers\NameHelper;
use Exception;
use Illuminate\Support\Str;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpFile;
use Saloon\Http\Auth\BasicAuthenticator;
use Saloon\Http\Connector;

use function is_null;
use function sprintf;

class ConnectorGenerator extends Generator
{
    public function generate(ApiSpecification $specification): PhpFile|array
    {
        return $this->generateConnectorClass($specification) ?? [];
    }

    protected function generateConnectorClass(ApiSpecification $specification): ?PhpFile
    {
        $classType = new ClassType($this->config->connectorName);
        $classType->setExtends(Connector::class);

        if ($specification->name !== null && $specification->name !== '' && $specification->name !== '0') {
            $classType->addComment($specification->name);
        }

        if ($specification->description !== null && $specification->description !== '' && $specification->description !== '0') {
            $classType->addComment($specification->name !== null && $specification->name !== '' && $specification->name !== '0' ? "\n{$specification->description}" : $specification->description);
        }

        $classFile = new PhpFile();

        $constructor = $classType->addMethod('__construct');
        $constructor->addPromotedParameter('customer')
            ->setType('string')
            ->setProtected()
            ->setReadOnly();
        $constructor->addPromotedParameter('username')
            ->setType('string')
            ->setProtected()
            ->setReadOnly();
        $constructor->addPromotedParameter('password')
            ->setType('string')
            ->setProtected()
            ->setReadOnly();

        if (is_null($specification->baseUrl)) {
            throw new Exception('Base URL is required in the API specification.');
        }

        $classType->addMethod('resolveBaseUrl')
            ->setReturnType('string')
            ->setBody(sprintf('return "%s";', Str::replaceFirst('{customer}', '{$this->customer}', $specification->baseUrl)));

        $classType->addMethod('defaultAuth')
            ->setReturnType(BasicAuthenticator::class)
            ->setProtected()
            ->setBody('return new BasicAuthenticator($this->username, $this->password);');

        $namespace = $classFile
            ->addNamespace("{$this->config->namespace}")
            ->addUse(Connector::class)
            ->addUse(BasicAuthenticator::class);

        $collections = collect($specification->endpoints)
            ->map(fn (Endpoint $endpoint): string => NameHelper::connectorClassName($endpoint->collection !== null && $endpoint->collection !== '' && $endpoint->collection !== '0' ? $endpoint->collection : $this->config->fallbackResourceName)) // @phpstan-ignore-line
            ->unique()
            ->sort()
            ->all();

        foreach ($collections as $collection) {
            $resourceClassName = NameHelper::connectorClassName($collection);
            $resourceFQN = "{$this->config->namespace}\\{$this->config->resourceNamespaceSuffix}\\{$resourceClassName}";

            $namespace->addUse($resourceFQN);

            // TODO: method names like "authenticate" will cause name collision with the Connector class methods,
            //  add a list of reserved method names and find a way to rename the method to something else, or add a pre/suffix

            $classType
                ->addMethod(NameHelper::safeVariableName($collection))
                ->setReturnType($resourceFQN)
                ->setBody(sprintf('return new %s($this);', $resourceClassName));
        }

        $namespace->add($classType);

        return $classFile;
    }
}
