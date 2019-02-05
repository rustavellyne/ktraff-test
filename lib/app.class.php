<?php
/**
 * Created by PhpStorm.
 * User: Sasha
 * Date: 2/5/2019
 * App
 */

class App
{
    protected static $router;

    public static $db;

    public static function run($uri)
    {
        self::$router = new Router($uri);

        self::$db = new DB(Config::get('db.host'), Config::get('db.user'), Config::get('db.password'), Config::get('db.db_name'));

        $controller_class = ucfirst(self::$router->getController()) . 'Controller';
        $controller_action = strtolower(self::$router->getAction());

        $controller_object = new $controller_class;

        if( method_exists($controller_class, $controller_action ) ){
            //get data from controller and action
            $data = $controller_object->$controller_action();
        } else {
            throw new Exception("Method {$controller_action} of {$controller_class} not found!" );
        }

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        if($data) {
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(array("message"=>"no data"));
        }
    }

    /**
     * @return mixed
     */
    public static function getRouter()
    {
        return self::$router;
    }
}