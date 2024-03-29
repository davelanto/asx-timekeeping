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
$routes->get('/', 'TimekeepingController::get');
$routes->post('/', 'TimekeepingController::get');
$routes->post('/get-employee-record', 'TimekeepingController::getEmployeeRecord');
$routes->post('/commit-log', 'TimekeepingController::save');

//Dashboard Routes
$routes->get('/dashboard', 'DashboardController::index');

//Employee Routes
$routes->get('/employee', 'EmployeeController::get');
$routes->post('/save-employee', 'EmployeeController::save');
$routes->post('/delete-employee', 'EmployeeController::delete');
$routes->post('/employee', 'EmployeeController::get');

//Settings Routes
$routes->get('/setting', 'SettingController::get');
$routes->post('/setting', 'SettingController::get');

//Branch Routes
$routes->post('/save-branch', 'BranchController::save');

//Department Routes
$routes->post('/save-department', 'DepartmentController::save');

//Designation Routes
$routes->post('/save-designation', 'DesignationController::save');

//Schedule routes
$routes->get('/schedule', 'ScheduleController::get');
$routes->post('/schedule', 'ScheduleController::get');
$routes->post('/upload-schedule', 'ScheduleController::upload');
$routes->get('/delete-schedule/(:num)', 'ScheduleController::remove/$1');


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
