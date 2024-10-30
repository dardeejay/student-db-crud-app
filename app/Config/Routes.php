<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'StudentController::search');
$routes->post('/api/student/create', 'StudentController::create');
$routes->get('/student/add', 'StudentController::add');
$routes->get('/student/list-all', 'StudentController::list');
$routes->get('/student/info:string', 'StudentController::information/$1');
$routes->get('/student/info', 'StudentController::information');
$routes->post('/student/delete', 'StudentController::delete');
$routes->get('/student/edit:string', 'StudentController::edit/$1');
$routes->get('/student/edit', 'StudentController::edit');
$routes->post('/api/student/edit', 'StudentController::update');

