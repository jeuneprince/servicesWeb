<?php

namespace App\Action;

use App\Domain\Livre\Service\AllAuthor;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class AllBooksAction
{
    private $allBook;

    public function __construct(AllAuthor $allBook)
    {
        $this->allBook = $allBook;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response, $livreId
    ): ResponseInterface {


        // Transform the result into the JSON representation

        $result = $this->allBook->showBooks();

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}
