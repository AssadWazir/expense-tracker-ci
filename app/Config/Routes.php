<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/',  'ExpenseController::index');

$routes->get('/register', 'Auth::register');
$routes->post('/doRegister', 'Auth::doRegister');


$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::doLogin');
$routes->get('logout', 'Auth::logout');

$routes->get('expenses', 'ExpenseController::index');
$routes->get('expenses/create', 'ExpenseController::create');
$routes->post('expenses/store', 'ExpenseController::store');
$routes->get('expenses/edit/(:num)', 'ExpenseController::edit/$1');
$routes->post('expenses/update/(:num)', 'ExpenseController::update/$1');
$routes->get('expenses/delete/(:num)', 'ExpenseController::delete/$1');

