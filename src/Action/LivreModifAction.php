<?php
namespace App\Action;
use App\Domain\Livre\Service\LivreModif;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
final class LivreModifAction
{
    private $livreModif;
    public function __construct(LivreModif $livreModif)
    {
        $this->livreModif = $livreModif;
    }
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response, $livreId
    ): ResponseInterface {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();
        $livreId = $request->getAttribute('id');
        // Invoke the Domain with inputs and retain the result
        $result = $this->livreModif->updateLivre($data,$livreId);
        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}