<?php

namespace App\Domain\Livre\Service;

use App\Domain\Livre\Repository\BookIdRepository;
use App\Exception\ValidationException;
use App\Factory\LoggerFactory;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

/**
 * Service.
 */
final class BookID
{
    /**
     * @var BookIdRepository
     */
    private $repository;
    private $logger;
    /**
     * The constructor.
     *
     * @param BookIdRepository $repository The repository
     * @param LoggerFactory $logger The logger
     *
     */
    public function __construct(BookIdRepository $repository, LoggerFactory $logger)
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

    public function showBooks($id) : array {

        return $this->repository->selectBookID($id);
    }
}
