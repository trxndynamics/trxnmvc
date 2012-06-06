<?php

namespace trxnMVC;

class Bootstrap
{
    public function __construct(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/');
            $url = explode('/', $url);

            if(isset($url[1])){
                $this->handleNav($url[0], $url[1]);
            } else {
                //404 page or default
                $this->handleNav($url[0], 'index');
            }
        } else {
            $this->handleNav('default');
        }
    }

    private function handleNav($controllerName, $viewName='index', $params=null){
        $controllerName = ucfirst($controllerName);
        $file           = __DIR__ . '/../../application/mvc/controllers/' . $controllerName . 'Controller.class.php';

        if(file_exists($file)){
            require_once($file);

            $controllerToRequest    = __NAMESPACE__ . '\\' . $controllerName . 'Controller';
            $controller             = new $controllerToRequest();

            if(method_exists($controller, $viewName.'Action')){
                $controller->{$viewName.'Action'}();
            }
        } else {
            $handled = $this->handleNavAlias($controllerName, $viewName);

            if($handled === false){
                require_once(__DIR__.'/../mvc/controllers/DefaultController.class.php');
                $controllerToRequest    = __NAMESPACE__ . '\\' . 'DefaultController';
                $controller             = new $controllerToRequest();
                $controller->pageNotFoundAction();
            }
        }
    }

    private function handleNavAlias($controllerName, $viewName){
        $handled = false;

        switch($controllerName){
            case 'Register':
                require_once(__DIR__.'/../mvc/controllers/LoginController.class.php');
                $controllerToRequest    = __NAMESPACE__ . '\\' . 'LoginController';
                $controller             = new $controllerToRequest();
                $controller->registerAction();
                $handled = true;
                break;
            case 'Logout':
                require_once(__DIR__.'/../mvc/controllers/LoginController.class.php');
                $controllerToRequest    = __NAMESPACE__ . '\\' . 'LoginController';
                $controller             = new $controllerToRequest();
                $controller->logoutAction();
                $handled = true;
                break;
        }

        return $handled;
    }
}

?>