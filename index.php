<?php

session_start();

require "core/init.php";
require "core/debug.php";

use liw\core\Router;

$router = new Router;

$router->run();
//Router checking is this route exist and whitch Controler and Action should to call



