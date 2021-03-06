<?php

namespace App\Action;

use App\Domain\Auteurs\Service\AllAuthor;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class AllAuthorAction
{
    private $allAuthor;

    public function __construct(allAuthor $allAuthor)
    {
        $this->allAuthor = $allAuthor;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response, $authorId
    ): ResponseInterface {


        // Transform the result into the JSON representation

        $result = $this->allAuthor->showAuthor();

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}
