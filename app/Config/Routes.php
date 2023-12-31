<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index', ['filter' => 'loginGuard']);
$routes->post('/login/authenticate', 'Login::authenticate');
$routes->post('/api/login/authenticate', 'Login::authenticateApi');

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'authGuard']);
$routes->get('/admin', 'Dashboard::admin', ['filter' => 'authGuard']);
$routes->get('/anggota', 'Dashboard::anggota', ['filter' => 'authGuard']);
//anggota
$routes->get('/anggota/tambah', 'Anggota::tambahAnggota', ['filter' => 'authGuard']);
$routes->post('/anggota/tambah', 'Anggota::tambahAnggotaAction', ['filter' => 'authGuard']);
$routes->get('/anggota/delete/(:any)', 'Anggota::hapusAnggota/$1', ['filter' => 'authGuard']);
//admin
$routes->get('/admin/tambah', 'Admin::tambahAdmin', ['filter' => 'authGuard']);
$routes->post('/admin/tambah', 'Admin::tambahAdminAction', ['filter' => 'authGuard']);
$routes->get('/admin/delete/(:any)', 'Admin::hapusAdmin/$1', ['filter' => 'authGuard']);
//end anggota
$routes->get('/buku', 'Dashboard::buku', ['filter' => 'authGuard']);
$routes->get('/buku/tambah', 'Buku::tambahBuku', ['filter' => 'authGuard']);
$routes->post('/buku/tambah', 'Buku::tambahBukuAction', ['filter' => 'authGuard']);
$routes->get('/buku/delete/(:any)', 'Buku::hapusBuku/$1', ['filter' => 'authGuard']);

$routes->get('/peminjaman', 'Dashboard::peminjaman', ['filter' => 'authGuard']);
$routes->get('/peminjaman/tambah', 'Peminjaman::tambahPeminjaman', ['filter' => 'authGuard']);
$routes->post('/peminjaman/tambah', 'Peminjaman::tambahPeminjamanAction', ['filter' => 'authGuard']);
$routes->get('/peminjaman/delete/(:any)', 'Peminjaman::hapusPeminjaman/$1', ['filter' => 'authGuard']);

$routes->get('/kategori', 'Dashboard::kategori', ['filter' => 'authGuard']);
$routes->get('/kategori/tambah', 'Kategori::tambahKategori', ['filter' => 'authGuard']);
$routes->post('/kategori/tambah', 'Kategori::tambahKategoriAction', ['filter' => 'authGuard']);
$routes->get('/kategori/delete/(:any)', 'Kategori::hapusKategori/$1', ['filter' => 'authGuard']);

$routes->get('/pengembalian', 'Dashboard::pengembalian', ['filter' => 'authGuard']);
$routes->get('/pengembalian/tambah', 'Pengembalian::tambahPengembalian', ['filter' => 'authGuard']);
$routes->post('/pengembalian/tambah', 'Pengembalian::tambahPengembalianAction', ['filter' => 'authGuard']);
$routes->get('/pengembalian/delete/(:any)', 'Pengembalian::hapusPengembalian/$1', ['filter' => 'authGuard']);

//register
$routes->get('register', 'Register::index', ['filter' => 'loginGuard']);
$routes->post('register', 'Register::register');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
