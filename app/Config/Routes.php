<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ── Setup (jalankan sekali setelah deploy)
$routes->get('setup', 'Setup::index');

// ── Public ──
$routes->get('/', 'Home::index');
$routes->get('berita/(:segment)', 'Home::beritaDetail/$1');
$routes->post('kontak/kirim', 'Home::kirimPesan');

// ── Admin Auth ──
$routes->get('admin/login', 'Admin\Auth::login');
$routes->post('admin/login', 'Admin\Auth::doLogin');
$routes->get('admin/logout', 'Admin\Auth::logout');

// ── Admin Panel ──
$routes->group('admin', ['filter' => 'auth'], static function (RouteCollection $routes) {
    $routes->get('/', 'Admin\Dashboard::index');
    $routes->get('dashboard', 'Admin\Dashboard::index');

    // Profil
    $routes->get('profil', 'Admin\Profile::index');
    $routes->post('profil/update', 'Admin\Profile::update');

    // Perangkat
    $routes->get('perangkat', 'Admin\Officials::index');
    $routes->get('perangkat/tambah', 'Admin\Officials::create');
    $routes->post('perangkat/simpan', 'Admin\Officials::store');
    $routes->get('perangkat/edit/(:segment)', 'Admin\Officials::edit/$1');
    $routes->post('perangkat/update/(:segment)', 'Admin\Officials::update/$1');
    $routes->post('perangkat/hapus/(:segment)', 'Admin\Officials::delete/$1');

    // Anggaran
    $routes->get('anggaran', 'Admin\Budgets::index');
    $routes->get('anggaran/tambah', 'Admin\Budgets::create');
    $routes->post('anggaran/simpan', 'Admin\Budgets::store');
    $routes->get('anggaran/edit/(:segment)', 'Admin\Budgets::edit/$1');
    $routes->post('anggaran/update/(:segment)', 'Admin\Budgets::update/$1');
    $routes->post('anggaran/hapus/(:segment)', 'Admin\Budgets::delete/$1');

    // Layanan
    $routes->get('layanan', 'Admin\Services::index');
    $routes->get('layanan/tambah', 'Admin\Services::create');
    $routes->post('layanan/simpan', 'Admin\Services::store');
    $routes->get('layanan/edit/(:segment)', 'Admin\Services::edit/$1');
    $routes->post('layanan/update/(:segment)', 'Admin\Services::update/$1');
    $routes->post('layanan/hapus/(:segment)', 'Admin\Services::delete/$1');

    // Wisata
    $routes->get('wisata', 'Admin\Tourism::index');
    $routes->get('wisata/tambah', 'Admin\Tourism::create');
    $routes->post('wisata/simpan', 'Admin\Tourism::store');
    $routes->get('wisata/edit/(:segment)', 'Admin\Tourism::edit/$1');
    $routes->post('wisata/update/(:segment)', 'Admin\Tourism::update/$1');
    $routes->post('wisata/hapus/(:segment)', 'Admin\Tourism::delete/$1');

    // Berita
    $routes->get('berita', 'Admin\NewsController::index');
    $routes->get('berita/tambah', 'Admin\NewsController::create');
    $routes->post('berita/simpan', 'Admin\NewsController::store');
    $routes->get('berita/edit/(:segment)', 'Admin\NewsController::edit/$1');
    $routes->post('berita/update/(:segment)', 'Admin\NewsController::update/$1');
    $routes->post('berita/hapus/(:segment)', 'Admin\NewsController::delete/$1');

    // Galeri
    $routes->get('galeri', 'Admin\GalleryController::index');
    $routes->get('galeri/tambah', 'Admin\GalleryController::create');
    $routes->post('galeri/simpan', 'Admin\GalleryController::store');
    $routes->get('galeri/edit/(:segment)', 'Admin\GalleryController::edit/$1');
    $routes->post('galeri/update/(:segment)', 'Admin\GalleryController::update/$1');
    $routes->post('galeri/hapus/(:segment)', 'Admin\GalleryController::delete/$1');

    // Pesan
    $routes->get('pesan', 'Admin\Messages::index');
    $routes->get('pesan/baca/(:segment)', 'Admin\Messages::markRead/$1');
    $routes->post('pesan/hapus/(:segment)', 'Admin\Messages::delete/$1');

    // Kependudukan
    $routes->get('kependudukan', 'Admin\Population::index');
    $routes->get('kependudukan/tambah', 'Admin\Population::create');
    $routes->post('kependudukan/simpan', 'Admin\Population::store');
    $routes->get('kependudukan/edit/(:segment)', 'Admin\Population::edit/$1');
    $routes->post('kependudukan/update/(:segment)', 'Admin\Population::update/$1');
    $routes->post('kependudukan/hapus/(:segment)', 'Admin\Population::delete/$1');

    // Infrastruktur
    $routes->get('infrastruktur', 'Admin\Infrastructures::index');
    $routes->get('infrastruktur/tambah', 'Admin\Infrastructures::create');
    $routes->post('infrastruktur/simpan', 'Admin\Infrastructures::store');
    $routes->get('infrastruktur/edit/(:segment)', 'Admin\Infrastructures::edit/$1');
    $routes->post('infrastruktur/update/(:segment)', 'Admin\Infrastructures::update/$1');
    $routes->post('infrastruktur/hapus/(:segment)', 'Admin\Infrastructures::delete/$1');

    // Pengaturan
    $routes->get('pengaturan', 'Admin\Settings::index');
    $routes->post('pengaturan/password', 'Admin\Settings::changePassword');

    // Upload AJAX
    $routes->post('upload', 'Admin\Upload::index');
});
