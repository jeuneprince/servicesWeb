<?php

namespace App\Domain\Livre\Service;

use App\Domain\Livre\Repository\BookTitreRepository;
use App\Exception\ValidationException;
use App\Factory\LoggerFactory;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

/**
 * Service.
 */
final class BookTitre
{
    /**
     * @var BookTitreRepository
     */
    private $repository;
    private $logger;
    /**
     * The constructor.
     *
     * @param BookTitreRepository $repository The repository
     * @param LoggerFactory $logger The logger
     *
     */
    public function __construct(BookTitreRepository $repository, LoggerFactory $logger)
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
     *
     * @return int The new livre ID
     */


    /**
     * Input validation.
     *
     * @param array $data The form data
     *
     * @throws ValidationException
     *
     * @return void
     */

    public function showBookTitre($titre) : array {

        return $this->repository->selectBookTitre($titre);
    }
}
