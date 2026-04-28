<?php

/*
 * Composer ClassLoader Stub
 * 
 * Stub agar CI4 bisa berjalan tanpa Composer install.
 * ClassLoader asli dari Composer akan menggantikan file ini
 * setelah Anda menjalankan `composer install`.
 */

namespace Composer\Autoload;

class ClassLoader
{
    private array $prefixLengthsPsr4 = [];
    private array $prefixDirsPsr4 = [];
    private array $fallbackDirsPsr4 = [];
    private array $prefixesPsr0 = [];
    private array $fallbackDirsPsr0 = [];
    private array $classMap = [];
    private array $files = [];

    public function getPrefixesPsr4(): array
    {
        return $this->prefixDirsPsr4;
    }

    public function getPrefixes(): array
    {
        return call_user_func_array('array_merge', $this->prefixesPsr0);
    }

    public function getFallbackDirsPsr4(): array
    {
        return $this->fallbackDirsPsr4;
    }

    public function getFallbackDirs(): array
    {
        return $this->fallbackDirsPsr0;
    }

    public function getClassMap(): array
    {
        return $this->classMap;
    }

    public function addClassMap(array $classMap): void
    {
        if ($this->classMap) {
            $this->classMap = array_merge($this->classMap, $classMap);
        } else {
            $this->classMap = $classMap;
        }
    }

    public function addPsr4(string $prefix, array|string $paths, bool $prepend = false): void
    {
        $paths = (array) $paths;
        if (!$prefix) {
            if ($prepend) {
                $this->fallbackDirsPsr4 = array_merge($paths, $this->fallbackDirsPsr4);
            } else {
                $this->fallbackDirsPsr4 = array_merge($this->fallbackDirsPsr4, $paths);
            }
        } elseif (!isset($this->prefixDirsPsr4[$prefix])) {
            $this->prefixDirsPsr4[$prefix] = $paths;
        } elseif ($prepend) {
            $this->prefixDirsPsr4[$prefix] = array_merge($paths, $this->prefixDirsPsr4[$prefix]);
        } else {
            $this->prefixDirsPsr4[$prefix] = array_merge($this->prefixDirsPsr4[$prefix], $paths);
        }
    }

    public function add(string $prefix, array|string $paths, bool $prepend = false): void
    {
        $paths = (array) $paths;
        if (!$prefix) {
            if ($prepend) {
                $this->fallbackDirsPsr0 = array_merge($paths, $this->fallbackDirsPsr0);
            } else {
                $this->fallbackDirsPsr0 = array_merge($this->fallbackDirsPsr0, $paths);
            }
            return;
        }
        $first = $prefix[0];
        if (!isset($this->prefixesPsr0[$first][$prefix])) {
            $this->prefixesPsr0[$first][$prefix] = $paths;
            return;
        }
        if ($prepend) {
            $this->prefixesPsr0[$first][$prefix] = array_merge($paths, $this->prefixesPsr0[$first][$prefix]);
        } else {
            $this->prefixesPsr0[$first][$prefix] = array_merge($this->prefixesPsr0[$first][$prefix], $paths);
        }
    }

    public function register(bool $prepend = false): void
    {
        spl_autoload_register([$this, 'loadClass'], true, $prepend);
    }

    public function unregister(): void
    {
        spl_autoload_unregister([$this, 'loadClass']);
    }

    public function loadClass(string $class): ?bool
    {
        if ($file = $this->findFile($class)) {
            includeFile($file);
            return true;
        }
        return null;
    }

    public function findFile(string $class): string|false
    {
        if (isset($this->classMap[$class])) {
            return $this->classMap[$class];
        }
        return false;
    }
}

function includeFile(string $file): void
{
    include $file;
}
