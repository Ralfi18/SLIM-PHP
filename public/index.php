<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

use App\IndexController;

require __DIR__ . '/../vendor/autoload.php';

define("FCPATH", realpath(__DIR__."/../"));
// var_dump(FCPATH);die;

$app = AppFactory::create();

// Add Error Handling Middleware
$app->addErrorMiddleware(true, false, false);

$app->get('/', [IndexController::class, "index"]);

$app->run();
