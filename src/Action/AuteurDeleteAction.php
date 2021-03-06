<?php
namespace App\Action;
use App\Domain\Auteurs\Service\AuteurDelete;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
final class AuteurDeleteAction
{
    private $auteurDelete;
    public function __construct(AuteurDelete $auteurDelete)
    {
        $this->auteurDelete = $auteurDelete;
    }
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response, $auteurId
    ): ResponseInterface {
        // Collect input from the HTTP request

        $auteurId = $request->getAttribute('id');
        // Invoke the Domain with inputs and retain the result
        $result = $this->auteurDelete->deleteauteur($auteurId);
        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}