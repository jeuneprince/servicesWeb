<?php

namespace App\Domain\Livre\Service;

use App\Domain\Livre\Repository\LivreDeleteRepository;
use App\Exception\ValidationException;
use App\Factory\LoggerFactory;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

/**
 * Service.
 */
final class LivreDelete
{
    /**
     * @var LivreDeleteRepository
     */
    private $repository;
    private $logger;

    /**
     * The constructor.
     *
     * @param LivreDeleteRepository $repository The repository
     * @param LoggerFactory $logger The logger
     *
     */
    public function __construct(LivreDeleteRepository $repository, LoggerFactory $logger)
    {
        $this->repository = $repository;
        $this->logger = $logger
            ->addFileHandler('CreateLivre.log')
            ->createLogger();

    }

    /**
     * Create a new user.
     *
     * @param array $data The form data
     ** @param int $livreid The form data
     * @return int The new livre ID
     */
    public function deleteLivre(int $livreid): bool
    {

        // update book
        $id = $this->repository->deleteLivre($livreid);

        //Logging here: Livre created successfully
        $this->logger->info(sprintf('Livre created successfully: %s', $id));

        return $id;
    }

}
