<?php

session_start();

require "../vendor/autoload.php";

use App\Core\Router;


(new Router())->run();

echo "<img src='imgpreview.jpg'>";