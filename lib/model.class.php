<?php
/**
 * Created by PhpStorm.
 * User: Sasha
 * Date: 2/5/2019
 * Time: 17:26
 */

class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = App::$db;
    }
}