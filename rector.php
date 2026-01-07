<?php

declare(strict_types=1);

use Rector\Caching\ValueObject\Storage\FileCacheStorage;
use Rector\Config\RectorConfig;
use Rector\Exception\Configuration\InvalidConfigurationException;
use Rector\Php83\Rector\ClassMethod\AddOverrideAttributeToOverriddenMethodsRector;
use Rector\Renaming\Rector\ClassConstFetch\RenameClassConstFetchRector;
use RectorLaravel\Set\LaravelLevelSetList;
use RectorLaravel\Set\LaravelSetList;
use RectorLaravel\Set\LaravelSetProvider;

try {
    return RectorConfig::configure()
        ->withSetProviders(LaravelSetProvider::class)
        ->withPhpSets(php85: true)
        ->withSets([
            LaravelLevelSetList::UP_TO_LARAVEL_120,
            LaravelSetList::LARAVEL_ARRAYACCESS_TO_METHOD_CALL,
            LaravelSetList::LARAVEL_ARRAY_STR_FUNCTION_TO_STATIC_CALL,
            LaravelSetList::LARAVEL_CODE_QUALITY,
            LaravelSetList::LARAVEL_COLLECTION,
            LaravelSetList::LARAVEL_CONTAINER_STRING_TO_FULLY_QUALIFIED_NAME,
            LaravelSetList::LARAVEL_ELOQUENT_MAGIC_METHOD_TO_QUERY_BUILDER,
            LaravelSetList::LARAVEL_FACADE_ALIASES_TO_FULL_NAMES,
            LaravelSetList::LARAVEL_FACTORIES,
            LaravelSetList::LARAVEL_IF_HELPERS,
            LaravelSetList::LARAVEL_LEGACY_FACTORIES_TO_CLASSES,
        ])
        ->withImportNames(
            removeUnusedImports: true,
        )
        ->withComposerBased(laravel: true)
        ->withCache(
            cacheDirectory: '/storage/tmp/rector',
            cacheClass: FileCacheStorage::class,
        )
        ->withPaths([
            __DIR__.'/app',
            __DIR__.'/bootstrap/app.php',
            __DIR__.'/config',
            __DIR__.'/database',
            __DIR__.'/public',
            __DIR__.'/routes',
            __DIR__.'/tests',
        ])
        ->withSkip([
            AddOverrideAttributeToOverriddenMethodsRector::class,
            RenameClassConstFetchRector::class => [
                '/config/database.php',
            ],
        ])
        ->withPreparedSets(
            $deadCode = true,
            $codeQuality = true,
            $codingStyle = true,
            $typeDeclarations = true,
            $typeDeclarationDocblocks = false,
            $privatization = true,
            $naming = false,
            $instanceOf = false,
            $earlyReturn = true,
            $strictBooleans = false,
            $carbon = false,
            $rectorPreset = false,
            $phpunitCodeQuality = false,
            $doctrineCodeQuality = false,
            $symfonyCodeQuality = false,
            $symfonyConfigs = false
        );
} catch (InvalidConfigurationException $exception) {
    // todo
}
