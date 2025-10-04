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

    $routes->get('/public/penggajian', 'PenggajianController::public');
    $routes->get('/admin/penggajian', 'PenggajianController::admin');

    $routes->get('/admin/komponen-gaji', 'KomponenGajiController::index');

    $routes->get('/admin/penggajian/(:num)', 'PenggajianController::detailAdmin/$1');
});