<?php

namespace SapientPro\EbayInventorySDK;

use League\Flysystem\Filesystem;
use League\Flysystem\Local\LocalFilesystemAdapter;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\Property;
use Nette\PhpGenerator\PsrPrinter;
use SapientPro\EbayInventorySDK\Models\EbayModelInterface;

class ModelGenerator
{
    private Filesystem $fileSystem;

    public function __construct(private string $sourcePath, private string $directory, private string $namespace)
    {
        $localAdapter = new LocalFilesystemAdapter($this->sourcePath);
        $this->fileSystem = new Filesystem($localAdapter);
    }

    public function generate(string $jsonPath): void
    {
        $json = $this->fileSystem->read($jsonPath);
        $data = json_decode($json);

        foreach ($data->schemas as $className => $classData) {
            $class = new ClassType($className);

            if (isset($classData->description)) {
                $class->addComment($classData->description);
            }

            $class->addImplement(EbayModelInterface::class);

            $properties = [];

            if (!isset($classData->properties)) {
                $this->writeFile($class, $className);
                continue;
            }

            foreach ($classData->properties as $propertyName => $property) {
                $classProperty = $class->addProperty($this->snakeToCamel($propertyName));

                if (isset($property->description)) {
                    $classProperty->addComment($property->description);
                }

                if (!isset($property->type)) {
                    $processedProperty = $this->processTypelessProperty($property, $classProperty);

                    $properties[] = $processedProperty;

                    continue;
                }

                $type = $this->processType($property->type);
                $classType = null !== $type ? $type : $property->type;

                if ('array' === $classType) {
                    $processedProperty = $this->processArrayProperty($property, $classProperty);

                    $properties[] = $processedProperty;

                    continue;
                }

                $classProperty->setType($classType);

                $properties[] = $classProperty;
            }

            $class->setProperties($properties);

            $this->writeFile($class, $className);
        }
    }

    private function processType(string $type): ?string
    {
        $typesMap = [
            'boolean' => 'bool',
            'integer' => 'int',
            'number' => 'float'
        ];

        return $typesMap[$type] ?? null;
    }

    private function extractObjectType(string $referenceObject): string
    {
        return $this->namespace . substr($referenceObject, strlen('#/components/schemas/'));
    }

    private function processTypelessProperty(object $jsonProperty, Property $classProperty): Property
    {
        $referenceObject = $jsonProperty->{'$ref'};
        $objectType = $this->extractObjectType($referenceObject);

        $classProperty->setType($objectType);
        $classProperty->addComment('@var ' . $objectType);

        return $classProperty;
    }

    private function processArrayProperty(object $jsonProperty, Property $classProperty): Property
    {
        $items = $jsonProperty->items;

        $classProperty->setType('array');

        $docBlockType = isset($items->{'$ref'})
            ? $this->extractObjectType($items->{'$ref'})
            : $items->type;

        $classProperty->addComment('@var ' . $docBlockType . '[]');

        return $classProperty;
    }

    private function writeFile(ClassType $class, string $className): void
    {
        $phpFile = new PhpFile();
        $namespace = $phpFile->addNamespace('SapientPro\\EbayInventorySDK\\Models');
        $namespace->add($class);

        $printer = new PsrPrinter();

        $this->fileSystem->write($this->directory . "\\$className" . ".php", $printer->printFile($phpFile));
    }

    private function snakeToCamel(string $string): string
    {
        return lcfirst(str_replace('_', '', ucwords($string, '_')));
    }
}
