<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
/*
$routes->get('competence/(:num)', 'Competence::competence/$1');
$routes->get('competence/(:num)', 'Competence::competence/$2');
$routes->get('competence/(:num)', 'Competence::competence/$3');
*/
$routes->get('c1', 'Competence1::index');
$routes->get('c2', 'Competence2::index');
$routes->get('c3', 'Competence3::index');
