<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$base_url = '/native-php-webapp/admin';

$request_uri = $_SERVER['REQUEST_URI'];

$request_path = parse_url($request_uri, PHP_URL_PATH);
$request_path = str_replace($base_url, '', $request_path);

$request_path = ltrim($request_path, '/');

require  'config/config.php';
require  'core/Router.php';
require  'core/Controller.php';
require  'models/UserModel.php';

require  'controllers/HomeController.php';
require  'controllers/DashboardController.php';
// require  'controllers/LoginController.php';

// $router = new Router();
// $router->dispatch($request_path);

switch ($request_path) {
    case '' :
        HomeController::index();
        break;
    case 'login' :
        HomeController::login();
        break;
    case 'logout' :
        HomeController::logout();
        break;
    case 'dashboard' :
        DashboardController::index();
        break;
    default:
        http_response_code(404);
        echo '404 Not Found';
}
?>