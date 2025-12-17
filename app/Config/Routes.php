<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'DashboardController::index');
// $routes->resource('mitra');
// $routes->resource('survei');
// $routes->resource('kegiatan-mitra');

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

