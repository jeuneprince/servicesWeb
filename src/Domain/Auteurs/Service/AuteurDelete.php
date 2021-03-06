<?php

namespace App\Domain\Auteurs\Service;

use App\Domain\Auteurs\Repository\AuteurDeleteRepository;
use App\Exception\ValidationException;
use App\Factory\LoggerFactory;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

/**
 * Service.
 */
final class AuteurDelete
{
    /**
     * @var AuteurDeleteRepository
     */
    private $repository;
    private $logger;

    /**
     * The constructor.
     *
     * @param AuteurDeleteRepository $repository The repository
     * @param LoggerFactory $logger The logger
     *
     */
    public function __construct(AuteurDeleteRepository $repository, LoggerFactory $logger)
    {
        $this->repository = $repository;
        $this->logger = $logger
            ->addFileHandler('Createauteur.log')
            ->createLogger();

    }

    /**
     * Create a new user.
     *
     * @param array $data The form data
     ** @param int $auteurid The form data
     * @return int The new auteur ID
     */
    public function deleteAuteur(int $auteurid): bool
    {

        // update book
        $id = $this->repository->deleteAuteur($auteurid);

        //Logging here: auteur created successfully
        $this->logger->info(sprintf('auteur created successfully: %s', $id));

        return $id;
    }

}
