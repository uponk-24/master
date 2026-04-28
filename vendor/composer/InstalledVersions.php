<?php

/*
 * Composer InstalledVersions Stub
 * CI4 calls InstalledVersions::getAllRawData() in Autoloader.php
 */

namespace Composer;

class InstalledVersions
{
    private static array $installed = [];

    public static function getAllRawData(): array
    {
        return [self::getInstalledData()];
    }

    public static function getInstalledPackages(): array
    {
        return ['codeigniter4/framework'];
    }

    public static function isInstalled(string $packageName): bool
    {
        return $packageName === 'codeigniter4/framework';
    }

    public static function getVersion(string $packageName): ?string
    {
        if ($packageName === 'codeigniter4/framework') {
            return '4.5.5';
        }
        return null;
    }

    public static function getInstallPath(string $packageName): ?string
    {
        if ($packageName === 'codeigniter4/framework') {
            return dirname(__DIR__, 2) . '/system';
        }
        return null;
    }

    private static function getInstalledData(): array
    {
        if (self::$installed === []) {
            self::$installed = [
                'versions' => [
                    'codeigniter4/framework' => [
                        'pretty_version' => 'v4.5.5',
                        'version' => '4.5.5.0',
                        'type' => 'library',
                        'install_path' => dirname(__DIR__, 2) . '/system',
                        'aliases' => [],
                        'reference' => null,
                    ],
                    'php' => [
                        'pretty_version' => PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION . '.' . PHP_RELEASE_VERSION,
                        'version' => PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION . '.' . PHP_RELEASE_VERSION . '.0',
                        'type' => 'library',
                        'install_path' => __DIR__ . '/../../system',
                        'aliases' => [],
                        'reference' => null,
                    ],
                ],
            ];
        }
        return self::$installed;
    }
}
