<?php
class Router {
    public function dispatch($requestUri) {
        $segments = explode('/', trim($requestUri, '/'));
        
        $controllerName = !empty($segments[0]) ? ucfirst($segments[0]) . 'Controller' : 'HomeController';
        $methodName = !empty($segments[1]) ? $segments[1] : 'index';

        if (file_exists("controllers/$controllerName.php")) {
            require "controllers/$controllerName.php";
            if (method_exists($controllerName, $methodName)) {
                call_user_func_array([$controllerName, $methodName], array_slice($segments, 2));
            } else {
                $this->error404();
            }
        } else {
            $this->error404();
        }
    }

    public function error404() {
        http_response_code(404);
        echo '404 Not Found';
    }
}
?>
