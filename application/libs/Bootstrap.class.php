<?php

namespace trxnMVC;

class Bootstrap
{
    private function storePageAccessData($controllerName, $viewName=''){
        try {
            require_once(__DIR__.'/MongoDB.database.class.php');
            $mongodb    = new \Mongo();
            $db         = $mongodb->selectDB(mongoDBDatabaseName);
            $collection = $db->selectCollection(mongoDBDatabaseName . '_pageviews');

            /*
             * verify page exists
            * COULD BE HANDLED BETTER, NO NEED FOR SUBSEQUENT CHECKS IF ALREADY IN DB, ONLY ON TIME OF INITIAL CREATION
            */

            $searchCriteria = array('controllerName'=>strtolower($controllerName), 'viewName'=>strtolower($viewName));

            if($collection->findOne($searchCriteria) != null){
                $updateData     = array('$inc'=>array('views'=>1));
                $collection->update($searchCriteria, $updateData);
            } else {
                $insertData             = $searchCriteria;
                $insertData['views']    = 1;
                $collection->insert($insertData);
            }
        } catch(\MongoConnectionException $mce){
            //service unavailable, redirect to index page
            header('Location: index');
        }
    }

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
                $this->storePageAccessData($controllerName, $viewName);
                $controller->{$viewName.'Action'}();
            } else {
                //method not found
                require_once(__DIR__.'/../mvc/controllers/DefaultController.class.php');
                $this->storePageAccessData('Default', 'index');
                $controller = new DefaultController();
                $controller->indexAction();
            }
        } else {
            $handled = $this->handleNavAlias($controllerName, $viewName);

            if($handled === false){
                require_once(__DIR__.'/../mvc/controllers/DefaultController.class.php');
                $controllerToRequest    = __NAMESPACE__ . '\\' . 'DefaultController';
                $controller             = new $controllerToRequest();
                $this->storePageAccessData('Default', 'pageNotFound');
                $controller->pageNotFoundAction();
            }
        }
    }

    private function handleNavAlias($controllerName, $viewName){
        $handled = false;

        switch($controllerName){
            case 'index':
            case 'Index':
                require_once(__DIR__.'/../mvc/controllers/DefaultController.class.php');
                $this->storePageAccessData('Default', 'index');
                $controller = new DefaultController();
                $controller->indexAction();
                $handled = true;
                break;
            case 'Register':
                require_once(__DIR__.'/../mvc/controllers/LoginController.class.php');
                $controllerToRequest    = __NAMESPACE__ . '\\' . 'LoginController';
                $controller             = new $controllerToRequest();
                $this->storePageAccessData('Login', 'register');
                $controller->registerAction();
                $handled = true;
                break;
            case 'logout':
            case 'Logout':
                require_once(__DIR__.'/../mvc/controllers/LoginController.class.php');
                $controllerToRequest    = __NAMESPACE__ . '\\' . 'LoginController';
                $controller             = new $controllerToRequest();
                $controller->logoutAction();
                $this->storePageAccessData('Login', 'logout');
                $handled = true;
                break;
            case 'about':
            case 'About':
                require_once(__DIR__.'/../mvc/controllers/DefaultController.class.php');
                $this->storePageAccessData('Default', 'index');
                $controller = new DefaultController();
                $controller->aboutAction();
                $handled = true;
                break;
            case 'subscribe':
            case 'Subscribe':
            require_once(__DIR__.'/../mvc/controllers/DefaultController.class.php');
                $this->storePageAccessData('Default', 'register');
                $controller = new DefaultController();
                $controller->subscribeAction();
                $handled = true;
                break;
        }

        return $handled;
    }
}

?>