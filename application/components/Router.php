<?php

class Router
{
    private $routes;//для хранения маршрута

    public function __construct() //прочит. и запомним роуты
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);//присв.свойству $routes массив который хранится в файле routes.php
    }

    /** Returns request string
     * @return string|void
     */
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) { //получаем нужную строку запроса(все что вводим в строке оно выводит на странице
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {


                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode('/', $internalRoute);
//                //print_r($segments);
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));


                $parameters = $segments;


                $controllerFile = ROOT . '/application/controllers/' .
                    $controllerName . '.php';

                if (file_exists($controllerFile)) { //зарание проверяем существует ли такой фаил на диске
                    include_once($controllerFile); // подключаем
                }
                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if ($result != null) {
                    break;
                }

            }

        }
    }
}

