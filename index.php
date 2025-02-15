<?php

ob_start();

require 'config/routes.php';

$request = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/user/login';

route($request);

ob_end_flush();

?>