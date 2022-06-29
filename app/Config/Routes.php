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

// Routing for Iso
$routes->get('iso/pdf', 'IsoController::pdf');
$routes->get('iso/excel', 'IsoController::excel');
$routes->get('iso', 'IsoController::index');
$routes->get('iso/create', 'IsoController::create');
$routes->post('iso/store', 'IsoController::store');
$routes->get('iso/edit/(:alphanum)', 'IsoController::edit/$1');
$routes->post('iso/update/(:num)', 'IsoController::update/$1');
$routes->get('iso/delete/(:alphanum)', 'IsoController::delete/$1');

// Routing for  Ska
$routes->get('ska/pdf', 'SkaController::pdf');
$routes->get('ska/excel', 'SkaController::excel');
$routes->get('ska', 'SkaController::index');
$routes->get('ska/create', 'SkaController::create');
$routes->post('ska/store', 'SkaController::store');
$routes->get('ska/edit/(:alphanum)', 'SkaController::edit/$1');
$routes->post('ska/update/(:num)', 'SkaController::update/$1');
$routes->get('ska/delete/(:alphanum)', 'SkaController::delete/$1');

// Routing for  Skt
$routes->get('skt/pdf', 'SktController::pdf');
$routes->get('skt/excel', 'SktController::excel');
$routes->get('skt', 'SktController::index');
$routes->get('skt/create', 'SktController::create');
$routes->post('skt/store', 'SktController::store');
$routes->get('skt/edit/(:alphanum)', 'SktController::edit/$1');
$routes->post('skt/update/(:num)', 'SktController::update/$1');
$routes->get('skt/delete/(:alphanum)', 'SktController::delete/$1');

// Routing client
$routes->get('client/pdf', 'ClientController::pdf');
$routes->get('client/excel', 'ClientController::excel');
$routes->get('client', 'ClientController::index');
$routes->get('client/create', 'ClientController::create');
$routes->post('client/store', 'ClientController::store');
$routes->get('client/edit/(:alphanum)', 'ClientController::edit/$1');
$routes->post('client/update/(:num)', 'ClientController::update/$1');
$routes->get('client/delete/(:alphanum)', 'ClientController::delete/$1');

// Routing client
$routes->get('arsip/pdf', 'ArsipController::pdf');
$routes->get('arsip/excel', 'ArsipController::excel');
$routes->get('arsip', 'ArsipController::index');
$routes->get('arsip/create', 'ArsipController::create');
$routes->post('arsip/store', 'ArsipController::store');
$routes->get('arsip/edit/(:alphanum)', 'ArsipController::edit/$1');
$routes->post('arsip/update/(:num)', 'ArsipController::update/$1');
$routes->get('arsip/delete/(:alphanum)', 'ArsipController::delete/$1');

// Routing for Ktiga
$routes->get('ktiga/pdf', 'KtigaController::pdf');
$routes->get('ktiga/excel', 'KtigaController::excel');
$routes->get('ktiga', 'KtigaController::index');
$routes->get('ktiga/create', 'KtigaController::create');
$routes->post('ktiga/store', 'KtigaController::store');
$routes->get('ktiga/edit/(:alphanum)', 'KtigaController::edit/$1');
$routes->post('ktiga/update/(:num)', 'KtigaController::update/$1');
$routes->get('ktiga/delete/(:alphanum)', 'KtigaController::delete/$1');


if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
