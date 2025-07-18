<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(false);

$routes->get('/', 'Home::index');
$routes->get('page/home', 'Home::index');
$routes->get('page/artikel', 'Page::daftarArtikel');
$routes->get('page/artikel/(:any)', 'Page::artikel/$1');
$routes->get('page/about', 'Page::about',);
$routes->get('page/contact', 'Page::contact');


$routes->get('ajax/getData', 'AjaxController::getData');
$routes->delete('ajax/delete/(:num)', 'AjaxController::delete/$1');
$routes->get('admin/ajax', 'AjaxController::index');

$routes->resource('post');

$routes->get('admin/artikel', 'Artikel::admin_index', ['filter' => 'auth']);
$routes->get('admin', 'Artikel::admin_index', ['filter' => 'auth']);
$routes->get('admin/edit', 'Artikel::edit');
$routes->add('admin/add', 'Artikel::add');
$routes->add('admin/edit/(:num)', 'Artikel::edit/$1');
$routes->get('admin/delete/(:any)', 'Artikel::delete/$1');
$routes->get('/page/kategori/(:segment)', 'Page::kategori/$1');
$routes->match(['get', 'post'], 'user/login', 'User::login');
