<?php
namespace App;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;

class Middleware
{
    /**
     * @param ServerRequest $request PSR-7 request
     * @param RequestHandler $handler PSR-15 request handler
     *dXNlcm5hbWU6IHNvdWxleW1hbmUuc291bWFyZSBwYXNzd29yZDphZG1pbg==
     * @return Response
     */
    public function authentification($username,$password): array
    {
        $sql = "SELECT username,password FROM users where username = :username and password = : password";
        $query = $this->connection->prepare($sql);
        $query->execute(array('username'=>$username,'password'=>$password));
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
      $response = $handler->handle($request);

      $data = (array)$request->getHeaders();
      base64_decode($data);
      $resultat = $this->authentification($data);
      $existingContent = (string) $resultat->getBody();
      $response= new Response();
      $response->getBody()->write('BEFORE' . $existingContent);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);

    }

}


