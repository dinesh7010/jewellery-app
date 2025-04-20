<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::login');
$routes->post('/auth/loginPost', 'Auth::loginPost');
$routes->get('/logout', 'Auth::logout');
$routes->get('signup', 'Auth::signup');
$routes->post('auth/register', 'Auth::register');


$routes->get('dashboard', 'Dashboard::index');
$routes->get('product/create', 'ProductController::create');
$routes->post('product/store', 'ProductController::store');
$routes->get('product/edit/(:num)', 'ProductController::edit/$1');
$routes->post('product/update/(:num)', 'ProductController::update/$1');
$routes->get('product/delete/(:num)', 'ProductController::delete/$1');
