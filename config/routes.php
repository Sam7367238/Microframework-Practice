<?php

use App\Controller\HomeController;
use Slim\App;

return function(App $app): void {
    $app -> get('/', [HomeController::class, "index"]) -> setName("app_index");
};