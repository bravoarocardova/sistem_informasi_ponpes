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
$routes->get('/pengumuman/berita', 'Home::pengumuman_berita');
$routes->get('/pengumuman/kelulusan', 'Home::pengumuman_kelulusan');
$routes->get('/pengumuman/(:num)', 'Home::detail_pengumuman/$1');

$routes->get('/sejarah', 'Home::sejarah');
$routes->get('/visi-misi', 'Home::visi_misi');
$routes->get('/struktur-organisasi', 'Home::struktur_organisasi');
$routes->get('/peraturan-pondok', 'Home::peraturan_pondok');
$routes->add('/pendaftaran', 'Home::pendaftaran');
$routes->add('/pendaftaran/(:segment)', 'Home::detail_pendaftaran/$1');
$routes->get('/kegiatan', 'Home::kegiatan');

$routes->add('/login', 'Home::login');
$routes->add('/logout', 'Home::logout');

// Santri
$routes->group('santri', ['filter' => 'isLoggedInSantri'], function ($routes) {
  $routes->get('dashboard', 'Santri');
  $routes->get('keasramaan', 'Santri::keasramaan');
  $routes->get('pengguna', 'Santri::pengguna');
  $routes->put('pengguna', 'Santri::edit_pengguna');
});

// Ustadz
$routes->group('ustadz', ['filter' => 'isLoggedInUstadz'], function ($routes) {
  $routes->get('dashboard', 'Santri');
  // $routes->get('keasramaan', 'Santri::keasramaan');
  // $routes->get('pengguna', 'Santri::pengguna');
  // $routes->put('pengguna', 'Santri::edit_pengguna');
});

// Admin

$routes->add('admin/login', 'Admin\AuthC::login');
$routes->add('admin/logout', 'Admin\AuthC::logout');

$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'isLoggedInAdmin'], function ($routes) {

  $routes->get('dashboard', 'AdminC::dashboard');

  $routes->group('data', function ($routes) {
    $routes->group('santri', function ($routes) {
      $routes->add('', 'DataC::data_santri');

      $routes->get('tambah', 'DataC::tambah_santri');
      $routes->post('tambah', 'DataC::proses_tambah_santri');

      $routes->get('edit/(:num)', 'DataC::edit_santri/$1');
      $routes->put('edit/(:num)', 'DataC::proses_edit_santri/$1');

      $routes->delete('hapus/(:num)', 'DataC::hapus_santri/$1');
    });

    $routes->group('santri_keluar', function ($routes) {
      $routes->get('', 'DataC::data_santri_keluar');

      // $routes->get('tambah', 'DataC::tambah_santri');
      // $routes->post('tambah', 'DataC::proses_tambah_santri');

      $routes->put('kembalikan/(:num)', 'DataC::proses_kembalikan_santri/$1');
      $routes->put('tambah/(:num)', 'DataC::proses_keluar_santri/$1');

      $routes->delete('hapus/(:num)', 'DataC::hapus_santri_keluar/$1');
    });

    $routes->group('alumni', function ($routes) {
      $routes->get('', 'DataC::data_santri_alumni');

      // $routes->get('tambah', 'DataC::tambah_santri');
      // $routes->post('tambah', 'DataC::proses_tambah_santri');

      $routes->put('kembalikan/(:num)', 'DataC::proses_kembalikan_santri_alumni/$1');
      $routes->put('tambah/(:num)', 'DataC::proses_tambah_alumni_santri/$1');

      $routes->delete('hapus/(:num)', 'DataC::hapus_santri_keluar/$1');
    });

    $routes->group('ustadz', function ($routes) {
      $routes->add('', 'DataC::data_ustadz');

      $routes->get('tambah', 'DataC::tambah_ustadz');
      $routes->post('tambah', 'DataC::proses_tambah_ustadz');

      $routes->get('edit/(:segment)', 'DataC::edit_ustadz/$1');
      $routes->put('edit/(:segment)', 'DataC::proses_edit_ustadz/$1');

      $routes->delete('hapus/(:segment)', 'DataC::hapus_ustadz/$1');
    });

    $routes->addRedirect('/', 'admin/dashboard');
  });

  $routes->group('penerimaan', function ($routes) {
    $routes->add('', 'DataC::data_penerimaan');

    // $routes->get('tambah', 'DataC::tambah_penerimaan');
    // $routes->post('tambah', 'DataC::proses_tambah_penerimaan');

    $routes->put('terima/(:segment)', 'DataC::terima_penerimaan/$1');
    $routes->put('tolak/(:segment)', 'DataC::tolak_penerimaan/$1');
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

  $routes->group('kegiatan', function ($routes) {
    $routes->get('', 'DataC::data_kegiatan');

    $routes->get('tambah', 'DataC::tambah_kegiatan');
    $routes->post('tambah', 'DataC::proses_tambah_kegiatan');

    $routes->get('edit/(:num)', 'DataC::edit_kegiatan/$1');
    $routes->put('edit/(:num)', 'DataC::proses_edit_kegiatan/$1');

    $routes->delete('hapus/(:num)', 'DataC::hapus_kegiatan/$1');
  });

  $routes->group('keasramaan', function ($routes) {
    $routes->get('', 'DataC::data_keasramaan');

    $routes->get('tambah', 'DataC::tambah_keasramaan');
    $routes->post('tambah', 'DataC::proses_tambah_keasramaan');

    $routes->get('edit/(:num)', 'DataC::edit_keasramaan/$1');
    $routes->put('edit/(:num)', 'DataC::proses_edit_keasramaan/$1');

    $routes->delete('hapus/(:num)', 'DataC::hapus_keasramaan/$1');

    $routes->group('detail', function ($routes) {
      $routes->get('(:segment)', 'DataC::detail_keasramaan/$1');

      $routes->get('(:segment)/tambah', 'DataC::tambah_detail_keasramaan/$1');
      $routes->post('(:segment)/tambah', 'DataC::proses_tambah_detail_keasramaan/$1');

      $routes->get('(:segment)/edit/(:num)', 'DataC::edit_detail_keasramaan/$1/$2');
      $routes->put('(:segment)/edit/(:num)', 'DataC::proses_edit_detail_keasramaan/$1/$2');

      $routes->delete('(:segment)/hapus/(:num)', 'DataC::hapus_detail_keasramaan/$1/$2');
    });
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
