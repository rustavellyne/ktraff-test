<?php
/**
 * Created by PhpStorm.
 * User: Sasha
 * Date: 2/5/2019
 * setting up configs to App
 */

Config::set('routes',array(
    'default'   => '',
    'admin'     => 'admin_'
));

//default configs

Config::set('default_route', 'default');
Config::set('default_controller', 'products');
Config::set('default_action','index');

//db configs

Config::set('db.host', 'localhost:3307');
Config::set('db.user', 'root');
Config::set('db.password', '');
Config::set('db.db_name', 'ktraff');