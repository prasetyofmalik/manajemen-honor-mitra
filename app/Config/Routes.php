<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'DashboardController::index');

$routes->get('/mitra', 'MitraController::index');
$routes->get('/mitra/create', 'MitraController::create');
$routes->post('/mitra/store', 'MitraController::store');
$routes->get('/mitra/edit/(:num)', 'MitraController::edit/$1');
$routes->post('/mitra/update/(:num)', 'MitraController::update/$1');
$routes->get('/mitra/delete/(:num)', 'MitraController::delete/$1');

$routes->get('/survei', 'SurveiController::index');
$routes->get('/survei/create', 'SurveiController::create');
$routes->post('/survei/store', 'SurveiController::store');
$routes->get('/survei/edit/(:num)', 'SurveiController::edit/$1');
$routes->post('/survei/update/(:num)', 'SurveiController::update/$1');
$routes->get('/survei/delete/(:num)', 'SurveiController::delete/$1');
$routes->get('/survei/kegiatan/(:num)', 'SurveiController::getKegiatanBySurvei/$1');

$routes->get('/kegiatan-mitra', 'KegiatanMitraController::index');
$routes->get('/kegiatan-mitra/create', 'KegiatanMitraController::create');
$routes->post('/kegiatan-mitra/store', 'KegiatanMitraController::store');
$routes->get('/kegiatan-mitra/edit/(:num)', 'KegiatanMitraController::edit/$1');
$routes->post('/kegiatan-mitra/update/(:num)', 'KegiatanMitraController::update/$1');
$routes->get('/kegiatan-mitra/delete/(:num)', 'KegiatanMitraController::delete/$1');

