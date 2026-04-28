<?php

/*
 * Composer Autoload
 * 
 * File ini adalah stub agar CI4 bisa berjalan tanpa Composer install.
 * CI4 meng-include file ini dan mengharapkan object ClassLoader dikembalikan.
 * 
 * Jika Anda ingin menggunakan Composer, jalankan: composer install
 * Composer akan menggantikan file ini dengan versi asli.
 */

if (! class_exists('Composer\Autoload\ClassLoader', false)) {
    require_once __DIR__ . '/composer/ClassLoader.php';
}

return new Composer\Autoload\ClassLoader();
