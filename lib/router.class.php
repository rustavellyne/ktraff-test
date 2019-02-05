<?php
/**
 * Created by PhpStorm.
 * User: Sasha
 * Date: 2/5/2019
 * for parsing of our URI and get controller adn action
 */

class Router
{
    protected $uri;

    protected $controller;

    protected $action;

    protected $params;

    protected $route;

    protected $method_prefix;


    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return mixed
     */
    public function getMethodPrefix()
    {
        return $this->method_prefix;
    }

    public function __construct($uri)
    {
        $this->uri = urldecode( trim($uri, '/') );

        //load defaults
        $routes = Config::get('routes');
        $this->route = Config::get('default_route');
        $this->method_prefix = $routes[$this->route];
        $this->controller = Config::get('default_controller');
        $this->action = Config::get('default_action');

        //break array for parts
        $uri_parts = explode('?', $this->uri);
        $path = $uri_parts[0];

        $path_parts = explode('/', $path);

        if( count($path_parts) ){
            if( current($path_parts) ){
                $this->controller = current($path_parts);
                array_shift($path_parts);
            }

            if( current($path_parts) ){
                $this->action = $this->method_prefix . strtolower( current($path_parts) );
                array_shift($path_parts);
            }

            $this->params = $path_parts;
        }
    }


}