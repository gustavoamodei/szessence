<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('User_controller');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');
$routes->get('main', 'User_controller::main');
$routes->get('listar_oleo','Oessencial_controller::index');
$routes->get('edit_oleo/(:num)','Oessencial_controller::edit/$1');
$routes->get('cadastro_oleo',"Oessencial_controller::create");
$routes->post('store_oleo','Oessencial_controller::store');
$routes->put('update_oleo/(:num)','Oessencial_controller:update');
$routes->post('delete_oleo','Oessencial_controller::delete');

$routes->get('listar_oleo_base','Obase_controller::index');
$routes->get('edit_oleo_base/(:num)','Obase_controller::edit/$1');
$routes->get('cadastro_oleo_base',"Obase_controller::create");
$routes->post('store_oleo_base','Obase_controller::store');
$routes->put('update_oleo_base/(:num)','Obase_controller:update');
$routes->post('delete_oleo_base','Obase_controller::delete');

$routes->get('listar_frasco','Frasco_controller::index');
$routes->get('edit_frasco/(:num)','Frasco_controller::edit/$1');
$routes->get('cadastro_frasco',"Frasco_controller::create");
$routes->post('store_frasco','Frasco_controller::store');
$routes->put('update_frasco/(:num)','Frasco_controller:update');
$routes->post('delete_frasco','Frasco_controller::delete');


$routes->get('listar_acessorio','Acessorio_controller::index');
$routes->get('edit_acessorio/(:num)','Acessorio_controller::edit/$1');
$routes->get('cadastro_acessorio',"Acessorio_controller::create");
$routes->post('store_acessorio','Acessorio_controller::store');
$routes->put('update_acessorio/(:num)','Acessorio_controller:update');
$routes->post('delete_acessorio','Acessorio_controller::delete');


$routes->get('listar_cliente','Cliente_controller::index');
$routes->get('edit_cliente/(:num)','Cliente_controller::edit/$1');
$routes->get('cadastro_cliente',"Cliente_controller::create");
$routes->post('store_cliente','Cliente_controller::store');
$routes->put('update_cliente/(:num)','Cliente_controller:update');
$routes->post('delete_cliente','Cliente_controller::delete');


$routes->get('simulacao',"Simulacao_controller::create");
$routes->post('store_simulacao','Simulacao_controller::store');
$routes->post('calculo','Simulacao_controller::calcular');
$routes->get('listar_orcamento','Simulacao_controller::index');
$routes->post('delete_orcamento','Simulacao_controller::delete');
$routes->get('edit_orcamento/(:num)','Simulacao_controller::edit/$1');

$routes->get("login","User_controller::index");
$routes->post("logar","User_controller::login");
$routes->get('deslogar',"User_controller::deslogar");
$routes->get("copiar_orcamento/(:num)","Simulacao_controller::copiar_orcamento/$1");



$routes->get('tabela1','Simulacao_controller::t1');
$routes->get('tabela2','Simulacao_controller::t2');
/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
