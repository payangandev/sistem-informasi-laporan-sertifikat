<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('LoginController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('login', 'LoginController::index');


// ROUTING DATA 
$routes->get('documentmasuk', 'DocumentMasukController::index');
$routes->get('documentmasuk/laporan', 'DocumentMasukController::laporan');
$routes->get('documentmasuk/create', 'DocumentMasukController::create');
$routes->post('documentmasuk/store', 'DocumentMasukController::store');
$routes->get('documentmasuk/edit/(:alphanum)', 'DocumentMasukController::edit/$1');
$routes->post('documentmasuk/update/(:num)', 'DocumentMasukController::update/$1');
$routes->get('documentmasuk/delete/(:alphanum)', 'DocumentMasukController::delete/$1');


// ROUTING DATA 
$routes->get('documentkeluar', 'DocumentKeluarController::index');
$routes->get('documentkeluar/laporan', 'DocumentKeluarController::laporan');
$routes->get('documentkeluar/create', 'DocumentKeluarController::create');
$routes->post('documentkeluar/store', 'DocumentKeluarController::store');
$routes->get('documentkeluar/edit/(:alphanum)', 'DocumentKeluarController::edit/$1');
$routes->post('documentkeluar/update/(:num)', 'DocumentKeluarController::update/$1');
$routes->get('documentkeluar/delete/(:alphanum)', 'DocumentKeluarController::delete/$1');


// ROUTING DATA
$routes->get('karyawan', 'KaryawanController::index');
$routes->get('karyawan/laporan', 'KaryawanController::laporan');
$routes->get('karyawan/htmlToPdf', 'KaryawanController::htmlToPdf');
$routes->get('karyawan/create', 'KaryawanController::create');
$routes->post('karyawan/store', 'KaryawanController::store');
$routes->get('karyawan/edit/(:alphanum)', 'KaryawanController::edit/$1');
$routes->post('karyawan/update/(:num)', 'KaryawanController::update/$1');
$routes->get('karyawan/delete/(:alphanum)', 'KaryawanController::delete/$1');



// ROUTING DATA 

$routes->get('notamasuk', 'NotaMasukController::index');
$routes->get('notamasuk/laporan', 'NotaMasukController::laporan');
$routes->get('notamasuk/create', 'NotaMasukController::create');
$routes->post('notamasuk/store', 'NotaMasukController::store');
$routes->get('notamasuk/edit/(:alphanum)', 'NotaMasukController::edit/$1');
$routes->post('notamasuk/update/(:num)', 'NotaMasukController::update/$1');
$routes->get('notamasuk/delete/(:alphanum)', 'NotaMasukController::delete/$1');


// ROUTING DATA 

$routes->get('notakeluar', 'NotaKeluarController::index');
$routes->get('notakeluar/laporan', 'NotaKeluarController::laporan');
$routes->get('notakeluar/create', 'NotaKeluarController::create');
$routes->post('notakeluar/store', 'NotaKeluarController::store');
$routes->get('notakeluar/edit/(:alphanum)', 'NotaKeluarController::edit/$1');
$routes->post('notakeluar/update/(:num)', 'NotaKeluarController::update/$1');
$routes->get('notakeluar/delete/(:alphanum)', 'NotaKeluarController::delete/$1');


// ROUTING DATA 

$routes->get('users', 'UsersController::index');
$routes->get('users/laporan', 'UsersController::laporan');
$routes->get('users/create', 'UsersController::create');
$routes->post('users/store', 'UsersController::store');
$routes->get('users/edit/(:alphanum)', 'UsersController::edit/$1');
$routes->post('users/update/(:num)', 'UsersController::update/$1');
$routes->get('users/delete/(:alphanum)', 'UsersController::delete/$1');


// ROUTING DATA Atk

$routes->get('atk', 'AtkController::index');
$routes->get('atk/laporan', 'AtkController::laporan');
$routes->get('atk/create', 'AtkController::create');
$routes->post('atk/store', 'AtkController::store');
$routes->get('atk/edit/(:alphanum)', 'AtkController::edit/$1');
$routes->post('atk/update/(:num)', 'AtkController::update/$1');
$routes->get('atk/delete/(:alphanum)', 'AtkController::delete/$1');




// ROUTING DATA 

$routes->get('users', 'UsersController::index');
$routes->get('users/laporan', 'UsersController::laporan');
$routes->get('users/create', 'UsersController::create');
$routes->post('users/store', 'UsersController::store');
$routes->get('users/edit/(:alphanum)', 'UsersController::edit/$1');
$routes->post('users/update/(:num)', 'UsersController::update/$1');
$routes->get('users/delete/(:alphanum)', 'UsersController::delete/$1');



// ROUTING DATA 

$routes->get('users', 'UsersController::index');
$routes->get('users/laporan', 'UsersController::laporan');
$routes->get('users/create', 'UsersController::create');
$routes->post('users/store', 'UsersController::store');
$routes->get('users/edit/(:alphanum)', 'UsersController::edit/$1');
$routes->post('users/update/(:num)', 'UsersController::update/$1');
$routes->get('users/delete/(:alphanum)', 'UsersController::delete/$1');



// ROUTING DATA 

$routes->get('users', 'UsersController::index');
$routes->get('users/laporan', 'UsersController::laporan');
$routes->get('users/create', 'UsersController::create');
$routes->post('users/store', 'UsersController::store');
$routes->get('users/edit/(:alphanum)', 'UsersController::edit/$1');
$routes->post('users/update/(:num)', 'UsersController::update/$1');
$routes->get('users/delete/(:alphanum)', 'UsersController::delete/$1');





if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
