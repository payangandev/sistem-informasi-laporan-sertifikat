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

// Routing for users
$routes->get('users/pdf', 'UsersController::pdf');
$routes->get('users/excel', 'UsersController::excel');
$routes->get('users', 'UsersController::index');
$routes->get('users/create', 'UsersController::create');
$routes->post('users/store', 'UsersController::store');
$routes->get('users/edit/(:alphanum)', 'UsersController::edit/$1');
$routes->post('users/update/(:num)', 'UsersController::update/$1');
$routes->get('users/delete/(:alphanum)', 'UsersController::delete/$1');

// Routing for karyawan
$routes->get('karyawan/pdf', 'KaryawanController::pdf');
$routes->get('karyawan/excel', 'KaryawanController::excel');
$routes->get('karyawan', 'KaryawanController::index');
$routes->get('karyawan/create', 'KaryawanController::create');
$routes->post('karyawan/store', 'KaryawanController::store');
$routes->get('karyawan/edit/(:alphanum)', 'KaryawanController::edit/$1');
$routes->post('karyawan/update/(:num)', 'KaryawanController::update/$1');
$routes->get('karyawan/delete/(:alphanum)', 'KaryawanController::delete/$1');


// Routing for supplier
$routes->get('supplier/pdf', 'SupplierController::pdf');
$routes->get('supplier/excel', 'SupplierController::excel');
$routes->get('supplier', 'SupplierController::index');
$routes->get('supplier/create', 'SupplierController::create');
$routes->post('supplier/store', 'SupplierController::store');
$routes->get('supplier/edit/(:alphanum)', 'SupplierController::edit/$1');
$routes->post('supplier/update/(:num)', 'SupplierController::update/$1');
$routes->get('supplier/delete/(:alphanum)', 'SupplierController::delete/$1');


// Routing for  celana
$routes->get('celana/pdf', 'CelanaController::pdf');
$routes->get('celana/excel', 'CelanaController::excel');
$routes->get('celana', 'CelanaController::index');
$routes->get('celana/create', 'CelanaController::create');
$routes->post('celana/store', 'CelanaController::store');
$routes->get('celana/edit/(:alphanum)', 'CelanaController::edit/$1');
$routes->post('celana/update/(:num)', 'CelanaController::update/$1');
$routes->get('celana/delete/(:alphanum)', 'CelanaController::delete/$1');


// Routing for  kemeja
$routes->get('kemeja/pdf', 'KemejaController::pdf');
$routes->get('kemeja/excel', 'KemejaController::excel');
$routes->get('kemeja', 'KemejaController::index');
$routes->get('kemeja/create', 'KemejaController::create');
$routes->post('kemeja/store', 'KemejaController::store');
$routes->get('kemeja/edit/(:alphanum)', 'KemejaController::edit/$1');
$routes->post('kemeja/update/(:num)', 'KemejaController::update/$1');
$routes->get('kemeja/delete/(:alphanum)', 'KemejaController::delete/$1');

// Routing for jaket
$routes->get('jaket/pdf', 'JaketController::pdf');
$routes->get('jaket/excel', 'JaketController::excel');
$routes->get('jaket', 'JaketController::index');
$routes->get('jaket/create', 'JaketController::create');
$routes->post('jaket/store', 'JaketController::store');
$routes->get('jaket/edit/(:alphanum)', 'JaketController::edit/$1');
$routes->post('jaket/update/(:num)', 'JaketController::update/$1');
$routes->get('jaket/delete/(:alphanum)', 'JaketController::delete/$1');

// Routing for tshirt
$routes->get('tshirt/pdf', 'TShirtController::pdf');
$routes->get('tshirt/excel', 'TShirtController::excel');
$routes->get('tshirt', 'TShirtController::index');
$routes->get('tshirt/create', 'TShirtController::create');
$routes->post('tshirt/store', 'TShirtController::store');
$routes->get('tshirt/edit/(:alphanum)', 'TShirtController::edit/$1');
$routes->post('tshirt/update/(:num)', 'TShirtController::update/$1');
$routes->get('tshirt/delete/(:alphanum)', 'TShirtController::delete/$1');

// Routing for belt
$routes->get('belt/pdf', 'BeltController::pdf');
$routes->get('belt/excel', 'BeltController::excel');
$routes->get('belt', 'BeltController::index');
$routes->get('belt/create', 'BeltController::create');
$routes->post('belt/store', 'BeltController::store');
$routes->get('belt/edit/(:alphanum)', 'BeltController::edit/$1');
$routes->post('belt/update/(:num)', 'BeltController::update/$1');
$routes->get('belt/delete/(:alphanum)', 'BeltController::delete/$1');



if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
