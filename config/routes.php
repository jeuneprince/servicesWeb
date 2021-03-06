<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;



return function (App $app) {
    $app->get('/', \App\Action\HomeAction::class)->setName('home');
    $app->get('/allbooks',\App\Action\AllBooksAction::class);
    $app->get('/allauthor',\App\Action\AllAuthorAction::class);
    $app->get('/book/{id}',\App\Action\BookIDAction::class);
    $app->get('/searchbook/{titre}',\App\Action\BookTitreAction::class);
    $app->get('/docs/v1', \App\Action\Docs\SwaggerUiAction::class);


    $app->post('/users', \App\Action\UserCreateAction::class)->add(\App\Middleware::class);
    $app->post('/newlivre', \App\Action\LivreCreateAction::class);
    $app->put('/modif/{id}', \App\Action\LivreModifAction::class);
    $app->delete('/delete/{id}', \App\Action\LivreDeleteAction::class);
    $app->delete('/auteurdelete/{id}', \App\Action\AuteurDeleteAction::class);

};

