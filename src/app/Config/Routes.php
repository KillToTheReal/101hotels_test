<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('PostController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


//I could have used the special requests for actions (PUT for update, DELETE for delete), but i'm not making api and don't wanna get into codeigniter specifications Right now, so i use get/post
//Returns main page
$routes->get('/', 'PostController::index');
//Logics of adding new post
$routes->post('/post/add', 'PostController::create');
// Returns all posts to display in a list
$routes->get('/post/fetch', 'PostController::fetchAll');
// Returns all fields of editable post to fill the edit form
$routes->get('/post/edit/(:num)', 'PostController::edit/$1');
// Logics of updating existing post
$routes->post('/post/update', 'PostController::update');
// Logics of deleting existing post
$routes->post('/post/delete', 'PostController::delete');
//Get all data of post to show details
$routes->get('/post/detail/(:num)', 'PostController::detail/$1');
// Adding a new comment
$routes->post('/comment/add', 'CommentsController::create');
// All comments for a post

//Fetch comments function. fetch/post_id/field_to_filter/Order_to_filter/pagination_page
$routes->get('/comment/fetch/(:any)/(:any)/(:any)/(:any)', 'CommentsController::fetch/$1/$2/$3/$4');

$routes->post('/comment/delete/(:num)', 'CommentsController::delete/$1');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
