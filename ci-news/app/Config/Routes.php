<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::index');
$routes->get('/login', 'AuthController::index');

$routes->post('/auth/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');

$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/public/dashboard', 'DashboardController::public');
    $routes->get('/admin/dashboard', 'DashboardController::admin');

    $routes->get('/public/anggota', 'AnggotaController::public');
    $routes->get('/admin/anggota', 'AnggotaController::admin');

    $routes->get('/admin/anggota/create', 'AnggotaController::create');
    $routes->post('/admin/anggota/store', 'AnggotaController::store');

    $routes->get('/admin/anggota/edit/(:num)', 'AnggotaController::edit/$1');
    $routes->post('/admin/anggota/update/(:num)', 'AnggotaController::update/$1');

    $routes->get('/admin/anggota/delete/(:num)', 'AnggotaController::delete/$1');

    $routes->get('/public/penggajian', 'PenggajianController::public');
    $routes->get('/admin/penggajian', 'PenggajianController::admin');

    $routes->get('/admin/komponen-gaji', 'KomponenGajiController::index');

    $routes->get('/admin/komponen-gaji/create', 'KomponenGajiController::create');
    $routes->post('/admin/komponen-gaji/store', 'KomponenGajiController::store');

    $routes->get('/admin/penggajian/(:num)', 'PenggajianController::detailAdmin/$1');
});