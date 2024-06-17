<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/auth', 'Auth::index');
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/save', 'Auth::save');
$routes->get('/register', 'Auth::register');
$routes->get('/register', 'Auth::register');
$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/check','Auth::check');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('//auth/logout','Auth::logout');
$routes->get('/auth/verifyemail', 'Auth::verifyemail');
