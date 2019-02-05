<?php
/**
 * main api file
 */

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

require_once (ROOT.DS.'lib'.DS.'init.php');

$uri = $_SERVER['REQUEST_URI'];

try {
    App::run($uri);
} catch (Exception $e) {
    echo "this is error {$e}";
}
