<?php
namespace App\Action;
use App\Domain\Livre\Service\AuteurDelete;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
final class LivreDeleteAction
{
    private $livreDelete;
    public function __construct(AuteurDelete $livreDelete)
    {
        $this->livreDelete = $livreDelete;
    }
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response, $livreId
    ): ResponseInterface {
        // Collect input from the HTTP request

        $livreId = $request->getAttribute('id');
        // Invoke the Domain with inputs and retain the result
        $result = $this->livreDelete->deleteLivre($livreId);
        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}