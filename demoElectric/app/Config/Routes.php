<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'About::index');
$routes->get('/services', 'Services::index');
$routes->match(['get', 'post'], '/contact', 'Contact::index');
$routes->get('/register', 'Register::index');
$routes->post('/register', 'Register::create');

$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login');
$routes->post('/logout', 'Auth::logout');

$routes->get('/dashboard', 'CustomerAccounts::index');
$routes->get('/accounts/create', 'CustomerAccounts::create');
$routes->post('/accounts', 'CustomerAccounts::store');
$routes->get('/accounts/(:num)/edit', 'CustomerAccounts::edit/$1');
$routes->post('/accounts/(:num)', 'CustomerAccounts::update/$1');
$routes->post('/accounts/(:num)/delete', 'CustomerAccounts::delete/$1');
