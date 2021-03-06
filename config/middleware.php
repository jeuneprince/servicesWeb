<?php
use Slim\Factory\AppFactory;
use Selective\BasePath\BasePathMiddleware;
use Slim\App;
use Slim\Middleware\ErrorMiddleware;
use Slim\Views\TwigMiddleware;

require __DIR__ . '/../vendor/autoload.php';

return function (App $app) {

    $app->addBodyParsingMiddleware();
    // Ajouter cette ligne
    $app->add(TwigMiddleware::class);

    // Add the Slim built-in routing middleware
    $app->addRoutingMiddleware();

    // Add app base path
    $app->add(BasePathMiddleware::class);

    // Catch exceptions and errors
    $app->add(ErrorMiddleware::class);

    // Parse json, form data and xml

};
