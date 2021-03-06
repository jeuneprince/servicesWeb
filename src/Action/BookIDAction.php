<?php

namespace App\Action;

use App\Domain\Livre\Service\BookID;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class BookIDAction
{
    private $Bookid;

    public function __construct(BookID $Bookid)
    {
        $this->Bookid = $Bookid;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response, $livreId
    ): ResponseInterface {
        $data = $request->getAttribute('id');

        // Transform the result into the JSON representation

        $result = $this->Bookid->showBooks($data);

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}
