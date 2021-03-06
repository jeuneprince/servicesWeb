<?php

namespace App\Action;

use App\Domain\Livre\Service\BookTitre;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class BookTitreAction
{
    private $Booktitre;

    public function __construct(BookTitre $Booktitre)
    {
        $this->Booktitre = $Booktitre;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response, $livreId
    ): ResponseInterface {
        $data = $request->getAttribute('titre');

        // Transform the result into the JSON representation

        $result = $this->Booktitre->showBookTitre($data);

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}
