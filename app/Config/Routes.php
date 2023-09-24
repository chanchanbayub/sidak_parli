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
$routes->setDefaultController('Admin\Dashboard');
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


$routes->get('/', 'Wr\LandingPage::index');
$routes->get('/search', 'Wr\LandingPage::search');

$routes->group('/admin', function ($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');
    // UKPD
    $routes->get('ukpd', 'Admin\Ukpd::index');
    $routes->post('ukpd/insert', 'Admin\Ukpd::insert');
    $routes->get('ukpd/edit', 'Admin\Ukpd::edit');
    $routes->post('ukpd/delete', 'Admin\Ukpd::delete');
    $routes->post('ukpd/update', 'Admin\Ukpd::update');
    // JENIS PENINDAKAN
    $routes->get('jenis_penindakan', 'Admin\JenisPenindakan::index');
    $routes->post('jenis_penindakan/insert', 'Admin\JenisPenindakan::insert');
    $routes->get('jenis_penindakan/edit', 'Admin\JenisPenindakan::edit');
    $routes->post('jenis_penindakan/delete', 'Admin\JenisPenindakan::delete');
    $routes->post('jenis_penindakan/update', 'Admin\JenisPenindakan::update');
    // SPT
    $routes->get('spt', 'Admin\SPT::index');
    $routes->post('spt/insert', 'Admin\SPT::insert');
    $routes->get('spt/edit', 'Admin\SPT::edit');
    $routes->post('spt/delete', 'Admin\SPT::delete');
    $routes->post('spt/update', 'Admin\SPT::update');
    // JENIS KENDARAAN
    $routes->get('jenis_kendaraan', 'Admin\JenisKendaraan::index');
    $routes->post('jenis_kendaraan/insert', 'Admin\JenisKendaraan::insert');
    $routes->get('jenis_kendaraan/edit', 'Admin\JenisKendaraan::edit');
    $routes->post('jenis_kendaraan/delete', 'Admin\JenisKendaraan::delete');
    $routes->post('jenis_kendaraan/update', 'Admin\JenisKendaraan::update');
    // TYPE KENDARAAN
    $routes->get('type_kendaraan', 'Admin\TypeKendaraan::index');
    $routes->post('type_kendaraan/insert', 'Admin\TypeKendaraan::insert');
    $routes->get('type_kendaraan/edit', 'Admin\TypeKendaraan::edit');
    $routes->post('type_kendaraan/delete', 'Admin\TypeKendaraan::delete');
    $routes->post('type_kendaraan/update', 'Admin\TypeKendaraan::update');
    // TEMPAT PENYIMPANAN
    $routes->get('tempat_penyimpanan', 'Admin\TempatPenyimpanan::index');
    $routes->post('tempat_penyimpanan/insert', 'Admin\TempatPenyimpanan::insert');
    $routes->get('tempat_penyimpanan/edit', 'Admin\TempatPenyimpanan::edit');
    $routes->post('tempat_penyimpanan/delete', 'Admin\TempatPenyimpanan::delete');
    $routes->post('tempat_penyimpanan/update', 'Admin\TempatPenyimpanan::update');
    // JENISPELANGGARAN
    $routes->get('jenis_pelanggaran', 'Admin\JenisPelanggaran::index');
    $routes->post('jenis_pelanggaran/insert', 'Admin\JenisPelanggaran::insert');
    $routes->get('jenis_pelanggaran/edit', 'Admin\JenisPelanggaran::edit');
    $routes->post('jenis_pelanggaran/delete', 'Admin\JenisPelanggaran::delete');
    $routes->post('jenis_pelanggaran/update', 'Admin\JenisPelanggaran::update');
    // ROLE MANAGEMENT
    $routes->get('role_management', 'Admin\RoleManagement::index');
    $routes->post('role_management/insert', 'Admin\RoleManagement::insert');
    $routes->get('role_management/edit', 'Admin\RoleManagement::edit');
    $routes->post('role_management/delete', 'Admin\RoleManagement::delete');
    $routes->post('role_management/update', 'Admin\RoleManagement::update');
    // JABATAN
    $routes->get('jabatan', 'Admin\Jabatan::index');
    $routes->post('jabatan/insert', 'Admin\Jabatan::insert');
    $routes->get('jabatan/edit', 'Admin\Jabatan::edit');
    $routes->post('jabatan/delete', 'Admin\Jabatan::delete');
    $routes->post('jabatan/update', 'Admin\Jabatan::update');

    // STATUS PENDEREKAN
    $routes->get('status_penderekan', 'Admin\StatusPenderekan::index');
    $routes->post('status_penderekan/insert', 'Admin\StatusPenderekan::insert');
    $routes->get('status_penderekan/edit', 'Admin\StatusPenderekan::edit');
    $routes->post('status_penderekan/delete', 'Admin\StatusPenderekan::delete');
    $routes->post('status_penderekan/update', 'Admin\StatusPenderekan::update');

    // IDENTITAS PETUGAS
    $routes->get('kartu_identitas', 'Admin\KartuIdentitas::index');
    $routes->post('kartu_identitas/insert', 'Admin\KartuIdentitas::insert');
    $routes->get('kartu_identitas/edit', 'Admin\KartuIdentitas::edit');
    $routes->post('kartu_identitas/delete', 'Admin\KartuIdentitas::delete');
    $routes->post('kartu_identitas/update', 'Admin\KartuIdentitas::update');

    // Berita Acara
    $routes->get('bap', 'Admin\BAP::index');
    $routes->post('bap/insert', 'Admin\BAP::insert');
    $routes->get('bap/edit', 'Admin\BAP::edit');
    $routes->post('bap/delete', 'Admin\BAP::delete');
    $routes->post('bap/update', 'Admin\BAP::update');

    // UNITREGU
    $routes->get('unit_regu', 'Admin\UnitRegu::index');
    $routes->post('unit_regu/insert', 'Admin\UnitRegu::insert');
    $routes->get('unit_regu/edit', 'Admin\UnitRegu::edit');
    $routes->post('unit_regu/delete', 'Admin\UnitRegu::delete');
    $routes->post('unit_regu/update', 'Admin\UnitRegu::update');

    // Petugas
    $routes->get('petugas', 'Admin\Petugas::index');
    $routes->post('petugas/insert', 'Admin\Petugas::insert');
    $routes->get('petugas/edit', 'Admin\Petugas::edit');
    $routes->post('petugas/delete', 'Admin\Petugas::delete');
    $routes->post('petugas/update', 'Admin\Petugas::update');
    $routes->get('petugas/detail/(:any)', 'Admin\Petugas::detail/$1');

    // STATUS PETUGAS
    $routes->get('status_petugas', 'Admin\StatusPetugas::index');
    $routes->post('status_petugas/insert', 'Admin\StatusPetugas::insert');
    $routes->get('status_petugas/edit', 'Admin\StatusPetugas::edit');
    $routes->post('status_petugas/delete', 'Admin\StatusPetugas::delete');
    $routes->post('status_petugas/update', 'Admin\StatusPetugas::update');

    // STATUS PETUGAS
    $routes->get('jenis_spk', 'Admin\JenisSpk::index');
    $routes->post('jenis_spk/insert', 'Admin\JenisSpk::insert');
    $routes->get('jenis_spk/edit', 'Admin\JenisSpk::edit');
    $routes->post('jenis_spk/delete', 'Admin\JenisSpk::delete');
    $routes->post('jenis_spk/update', 'Admin\JenisSpk::update');

    // TANDA TANGAN PETUGAS
    $routes->get('tanda_tangan_petugas', 'Admin\TandaTanganPetugas::index');
    $routes->post('tanda_tangan_petugas/insert', 'Admin\TandaTanganPetugas::insert');
    $routes->get('tanda_tangan_petugas/edit', 'Admin\TandaTanganPetugas::edit');
    $routes->post('tanda_tangan_petugas/delete', 'Admin\TandaTanganPetugas::delete');
    $routes->post('tanda_tangan_petugas/update', 'Admin\TandaTanganPetugas::update');

    // Data Penindakan
    $routes->get('data_penindakan', 'Admin\DataPenindakan::index');
    $routes->get('data_penindakan/tambah_penindakan', 'Admin\DataPenindakan::tambah_penindakan');
    $routes->get('data_penindakan/getPPNS', 'Admin\DataPenindakan::getPPNS');
    $routes->get('data_penindakan/getNomorBap', 'Admin\DataPenindakan::getNomorBap');
    $routes->get('data_penindakan/getTypeKendaraan', 'Admin\DataPenindakan::getTypeKendaraan');
    $routes->get('data_penindakan/getKota', 'Admin\DataPenindakan::getKota');
    $routes->get('data_penindakan/getKecamatan', 'Admin\DataPenindakan::getKecamatan');
    $routes->post('data_penindakan/insert', 'Admin\DataPenindakan::insert');
    $routes->get('data_penindakan/detail/(:any)', 'Admin\DataPenindakan::detail/$1');
    $routes->get('data_penindakan/edit', 'Admin\DataPenindakan::edit');
    $routes->get('data_penindakan/edit_status', 'Admin\DataPenindakan::edit_status');
    $routes->get('data_penindakan/edit_data/(:any)', 'Admin\DataPenindakan::edit_data/$1');

    $routes->get('data_penindakan/detail_terbayar/', 'Admin\DataPenindakan::detail_terbayar');
    $routes->get('data_penindakan/detail_belum_terbayar/', 'Admin\DataPenindakan::detail_belum_terbayar');
    $routes->get('data_penindakan/detail_selesai/', 'Admin\DataPenindakan::detail_selesai');

    $routes->get('data_penindakan/detail_terbayar_perhari/', 'Admin\DataPenindakan::detail_terbayar_perhari');
    $routes->get('data_penindakan/detail_belum_terbayar_perhari/', 'Admin\DataPenindakan::detail_belum_terbayar_perhari');
    $routes->get('data_penindakan/detail_selesai_perhari/', 'Admin\DataPenindakan::detail_selesai_perhari');

    $routes->post('data_penindakan/delete', 'Admin\DataPenindakan::delete');
    $routes->post('data_penindakan/update', 'Admin\DataPenindakan::update_data');


    // SPK
    $routes->get('surat_pengeluaran', 'Admin\SuratPengeluaran::index');
    $routes->post('surat_pengeluaran/insert', 'Admin\SuratPengeluaran::insert');
    $routes->get('surat_pengeluaran/edit', 'Admin\SuratPengeluaran::edit');
    $routes->post('surat_pengeluaran/delete', 'Admin\SuratPengeluaran::delete');
    $routes->post('surat_pengeluaran/update', 'Admin\SuratPengeluaran::update');

    $routes->get('unit_regu_detail', 'Admin\UnitRegu::detail_data');
    $routes->get('unit_regu_detail/(:any)', 'Admin\UnitRegu::detail_unit/$1');


    $routes->get('ocp', 'Admin\Ocp::index');
    $routes->get('ocp/getKota', 'Admin\Ocp::getKota');
    $routes->get('ocp/getKecamatan', 'Admin\Ocp::getKecamatan');
    $routes->post('ocp/insert', 'Admin\Ocp::insert');
    $routes->get('ocp/detail/(:any)', 'Admin\Ocp::detail/$1');
    $routes->get('ocp/edit', 'Admin\Ocp::edit');
    $routes->post('ocp/delete', 'Admin\Ocp::delete');
    $routes->post('ocp/update', 'Admin\Ocp::update');

    // KENDARAAN DINAS
    $routes->get('kendaraan_dinas', 'Admin\KendaraanDinas::index');
    $routes->post('kendaraan_dinas/insert', 'Admin\KendaraanDinas::insert');
    $routes->get('kendaraan_dinas/edit', 'Admin\KendaraanDinas::edit');
    $routes->get('kendaraan_dinas/detail/(:any)', 'Admin\KendaraanDinas::detail/$1');
    $routes->post('kendaraan_dinas/delete', 'Admin\KendaraanDinas::delete');
    $routes->post('kendaraan_dinas/update', 'Admin\KendaraanDinas::update');


    $routes->get('user_profile/(:num)', 'Admin\UserProfile::index/$1');
    $routes->post('user_profile/update', 'Admin\UserProfile::update');
});

$routes->get('/pdf/bap_digital/(:any)', 'Pdf\Pdf::index/$1');
$routes->get('/exportExcel', 'Excel\ExportExcel::index');

$routes->group('/auth', function ($routes) {
    $routes->get('login', 'Auth\Login::index');
    $routes->post('check_login', 'Auth\Login::check_login');
    $routes->get('logout', 'Auth\Login::logout');
});

$routes->group('/petugas', function ($routes) {
    $routes->get('dashboard', 'Petugas\Dashboard::index');

    $routes->get('data_penindakan', 'Petugas\DataPenindakan::index');
    $routes->get('data_penindakan/tambah_penindakan', 'Petugas\DataPenindakan::tambah_penindakan');
    // $routes->get('data_penindakan/getPPNS', 'Petugas\DataPenindakan::getPPNS');
    $routes->get('data_penindakan/getNomorBap', 'Petugas\DataPenindakan::getNomorBap');
    $routes->get('data_penindakan/getTypeKendaraan', 'Petugas\DataPenindakan::getTypeKendaraan');
    $routes->get('data_penindakan/getKota', 'Petugas\DataPenindakan::getKota');
    $routes->get('data_penindakan/getKecamatan', 'Petugas\DataPenindakan::getKecamatan');
    $routes->post('data_penindakan/insert', 'Petugas\DataPenindakan::insert');
    $routes->get('data_penindakan/detail/(:any)', 'Petugas\DataPenindakan::detail/$1');
    $routes->get('data_penindakan/edit', 'Petugas\DataPenindakan::edit');
    $routes->get('data_penindakan/edit_data/(:any)', 'Petugas\DataPenindakan::edit_data/$1');

    $routes->post('data_penindakan/delete', 'Petugas\DataPenindakan::delete');
    $routes->post('data_penindakan/update', 'Petugas\DataPenindakan::update_data');

    $routes->get('ocp', 'Petugas\Ocp::index');
    $routes->get('ocp/getKota', 'Petugas\Ocp::getKota');
    $routes->get('ocp/getKecamatan', 'Petugas\Ocp::getKecamatan');
    $routes->post('ocp/insert', 'Petugas\Ocp::insert');
    $routes->get('ocp/detail/(:any)', 'Petugas\Ocp::detail/$1');
    $routes->get('ocp/edit', 'Petugas\Ocp::edit');
    $routes->post('ocp/delete', 'Petugas\Ocp::delete');
    $routes->post('ocp/update', 'Petugas\Ocp::update');

    $routes->get('user_profile/(:num)', 'Petugas\UserProfile::index/$1');
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
