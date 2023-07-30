<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();
// $routes->setAutoRoute(true);
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
$routes->group('admin', ['filter' => 'admin'],static function ($routes) {
    $routes->get('products/new', 'Product::create');
    $routes->post('products/new', 'Product::create');
    $routes->get('users', 'Admin\UserController::index');
    $routes->get('allusers', 'Admin\UserController::allusers');
    $routes->get('test1', 'Benchmark::test1');
    $routes->get('test2', 'Benchmark::test2');    
    $routes->get('dashboard', 'Admin\DashboardController::index');
    $routes->get('subcategory', 'Admin\SubcategoryController::index');
    $routes->get('subcategory/page/(:num)', 'Admin\SubcategoryController::getPaginatedData/$1');
    $routes->get('subcategory/all', 'Admin\SubcategoryController::all');
    $routes->post('subcategory/new', 'Admin\SubcategoryController::create');
    $routes->post('subcategory/delete', 'Admin\SubcategoryController::delete');
});


// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::login');
$routes->get('/registration', 'AuthController::register');
$routes->post('/registration', 'AuthController::register');
$routes->get('/check', 'AuthController::check');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/profile', 'ProfileController::index');
$routes->post('/profile', 'ProfileController::index');

$routes->get('db1', 'Admin\DbController::db1');
$routes->get('db2', 'Admin\DbController::db2');
$routes->get('db/insert/(:any)', 'Admin\DbController::insert/$1');
$routes->get('db/querybuilder', 'Admin\DbController::querybuilder');
$routes->get('db/categories', 'Admin\DbController::categories');
$routes->get('db/getwhere', 'Admin\DbController::getwhere');
$routes->get('db/addcategory', 'Admin\DbController::newcat');
$routes->get('db/upsert', 'Admin\DbController::upsert');
$routes->get('db/update', 'Admin\DbController::update');
$routes->get('db/api', 'Admin\DbController::api');
$routes->get('db/chaining', 'Admin\DbController::chaining');


$routes->get('/bs5', 'NewLayout::index');
$routes->get('/test', 'Home::test');
/* $routes->get('/test1', 'Benchmark::test1');
$routes->get('/test2', 'Benchmark::test2'); */
$routes->get('/static/(:any)', 'Pages::view/$1');
$routes->get('/products', 'Product::index',['as' => 'products']);


$routes->get('/details/(:any)', 'Product::details/$1');
$routes->get('/testimage', 'ImageController::index');
$routes->get('/createthumb', 'ImageController::createthumb');
$routes->get('/pngtojpg', 'ImageController::pngtojpg');
$routes->get('/flip', 'ImageController::flip');
$routes->get('/degree90', 'ImageController::degree90');
$routes->get('/degree180', 'ImageController::degree180');
$routes->get('/resize', 'ImageController::resize');
$routes->get('/textwatermark/(:any)', 'ImageController::textwatermark/$1');
$routes->get('/imagewatermark', 'ImageController::imagewatermark');
$routes->get('/logowatermark', 'ImageController::logowatermark');

// $routes->post('/main', 'Home::index');
/* $routes->get('/home', 'Home::index');
$routes->get('/hakunamatata', 'Home::index');
$routes->get('/about', 'About::index');
$routes->get('/product', 'Product::index');
$routes->get('/contact', 'Contact::index'); */
//##################API###############
$routes->get('/api/products', 'Api\ProductController::index');
$routes->get('/api/products/(:num)', 'Api\ProductController::single/$1');
$routes->get('/api/testproducts/(:num)/(:any)', 'Api\ProductController::test/$1/$2');
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
