<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');



$routes->get('/tasks', 'taskcontroller::add_taskin');
$routes->get('/task', 'taskcontroller::add_task');
$routes->post('/task', 'taskcontroller::add_task');
 $routes->post('/updatetask/(:num)', 'taskcontroller::update_task_multiple/$1');
$routes->post('updateTaskStatus','taskcontroller::updateTaskStatus');

$routes->post('edit', 'taskcontroller::edit_task');
$routes->post('/update/(:num)', 'taskcontroller::update_task/$1');
$routes->post('delete', 'taskcontroller::delete');
$routes->post('search', 'taskcontroller::search');




//taskassign//
$routes->get('/my-task', 'taskcontroller::add_taskself');
$routes->post('/my-task', 'taskcontroller::add_taskself');
$routes->get('/task-in', 'taskcontroller::add_taskin');
$routes->post('/task-in', 'taskcontroller::add_taskin');


// $routes->get('/task', 'Apicontroller::add_task');
// $routes->post('/task', 'Apicontroller::add_task');
// $routes->post('edit', 'Apicontroller::edit_task');
// $routes->post('updateTaskStatus','Apicontroller::updateTaskStatus');
// $routes->post('/update/(:num)', 'Apicontroller::update_task/$1');
// $routes->post('delete', 'Apicontroller::delete_task');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
