<?php

namespace Nikitinuser\Tinyfilemanager;

class Router
{
    public const CONTROLLERS_NAMESPACE = 'Nikitinuser\\Tinyfilemanager\\Controllers\\';

    /**
     * must be symbols / on start and on end
     * example /getSmth/
     */
    public const ROUTES = [
        '/' => 'FileManagerController:index',
        '/download' => 'FileManagerController:download',
        '/upload' => 'FileManagerController:upload',
        '/auth/login/' => 'AuthController:login',
        '/auth/login/form' => 'AuthController:getLoginForm',
        '/auth/logout/' => 'AuthController:logout',
    ];

    /**
     * @param string $route
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function route(string $route): mixed
    {
        $routeExec = $this->getRoute($route);

        if (empty($routeExec)) {
            //throw new \Exception('ERROR: route '.$routeExec.' not found');
        }

        $routeClass = $this->getClassFromRoute($routeExec);
        $routeMethod = $this->getMethodFromRoute($routeExec);

        $classFull = self::CONTROLLERS_NAMESPACE . $routeClass;

        if (!class_exists($classFull)) {
            throw new \Exception('ERROR: class '.$classFull.' does not exist');
        }
        
        if (!method_exists($classFull, $routeMethod)) {
            throw new \Exception('ERROR: method '.$routeMethod.' in class '.$classFull.' does not exist');
        }

        $obj = new $classFull();
        return $obj->$routeMethod();
    }

    /**
     * @param string
     *
     * @return string
     */
    private function getRoute(string $route): string
    {
        return self::ROUTES[$route] ?? '';
    }

    /**
     * @param string
     *
     * @return string
     */
    private function getClassFromRoute(string $route): string
    {
        $route = explode(':', $route);
        return $route[0];
    }

    /**
     * @param string
     *
     * @return string
     */
    private function getMethodFromRoute(string $route): string
    {
        $route = explode(':', $route);
        return $route[1];
    }
}
