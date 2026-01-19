<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'pages::index');
$routes->get('/riwayatpeminjaman', 'RiwayatPeminjaman::index');
$routes->get('/contact', 'pages::contact');
$routes->get('/databarang', 'DataBarang::index');