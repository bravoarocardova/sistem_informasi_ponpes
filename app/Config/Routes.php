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
$routes->get('/galery', 'Home::galery');
$routes->get('/pengumuman', 'Home::pengumuman');
$routes->get('/pengumuman/(:num)', 'Home::detail_pengumuman/$1');

$routes->add('admin/login', 'Admin\AuthC::login');
$routes->add('admin/logout', 'Admin\AuthC::logout');

$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'isLoggedInAdmin'], function ($routes) {

  $routes->get('dashboard', 'AdminC::dashboard');

  $routes->group('data', function ($routes) {
    $routes->group('santri', function ($routes) {
      $routes->get('', 'DataC::data_santri');

      $routes->get('tambah', 'DataC::tambah_santri');
      $routes->post('tambah', 'DataC::proses_tambah_santri');

      $routes->get('edit/(:num)', 'DataC::edit_santri/$1');
      $routes->put('edit/(:num)', 'DataC::proses_edit_santri/$1');

      $routes->delete('hapus/(:num)', 'DataC::hapus_santri/$1');
    });

    $routes->group('ustadz', function ($routes) {
      $routes->get('', 'DataC::data_ustadz');

      $routes->get('tambah', 'DataC::tambah_ustadz');
      $routes->post('tambah', 'DataC::proses_tambah_ustadz');

      $routes->get('edit/(:segment)', 'DataC::edit_ustadz/$1');
      $routes->put('edit/(:segment)', 'DataC::proses_edit_ustadz/$1');

      $routes->delete('hapus/(:segment)', 'DataC::hapus_ustadz/$1');
    });

    $routes->addRedirect('/', 'admin/dashboard');
  });

  $routes->group('penerimaan', function ($routes) {
    $routes->get('', 'DataC::data_penerimaan');

    // $routes->get('tambah', 'DataC::tambah_penerimaan');
    // $routes->post('tambah', 'DataC::proses_tambah_penerimaan');

    // $routes->get('edit/(:segment)', 'DataC::edit_penerimaan/$1');
    // $routes->put('edit/(:segment)', 'DataC::proses_edit_penerimaan/$1');

    $routes->delete('hapus/(:segment)', 'DataC::hapus_penerimaan/$1');
  });

  $routes->group('pengumuman', function ($routes) {
    $routes->get('', 'DataC::data_pengumuman');

    $routes->get('tambah', 'DataC::tambah_pengumuman');
    $routes->post('tambah', 'DataC::proses_tambah_pengumuman');

    $routes->get('edit/(:num)', 'DataC::edit_pengumuman/$1');
    $routes->put('edit/(:num)', 'DataC::proses_edit_pengumuman/$1');

    $routes->delete('hapus/(:num)', 'DataC::hapus_pengumuman/$1');
  });

  $routes->group('galery', function ($routes) {
    $routes->get('', 'DataC::data_galery');

    $routes->get('tambah', 'DataC::tambah_galery');
    $routes->post('tambah', 'DataC::proses_tambah_galery');

    $routes->get('edit/(:num)', 'DataC::edit_galery/$1');
    $routes->put('edit/(:num)', 'DataC::proses_edit_galery/$1');

    $routes->delete('hapus/(:num)', 'DataC::hapus_galery/$1');
  });

  $routes->group('slideshow', function ($routes) {
    $routes->get('', 'DataC::data_slideshow');

    $routes->get('tambah', 'DataC::tambah_slideshow');
    $routes->post('tambah', 'DataC::proses_tambah_slideshow');

    $routes->get('edit/(:num)', 'DataC::edit_slideshow/$1');
    $routes->put('edit/(:num)', 'DataC::proses_edit_slideshow/$1');

    $routes->delete('hapus/(:num)', 'DataC::hapus_slideshow/$1');
  });

  $routes->group('profil', function ($routes) {
    $routes->add('aplikasi', 'ProfilC::aplikasi');

    $routes->add('sejarah', 'ProfilC::sejarah');

    $routes->add('visi_misi', 'ProfilC::visi_misi');

    $routes->add('struktur', 'ProfilC::struktur');

    $routes->add('peraturan_pondok', 'ProfilC::peraturan_pondok');
  });

  $routes->add('pengguna', 'ProfilC::pengguna');


  $routes->addRedirect('/', 'admin/dashboard');
});

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
