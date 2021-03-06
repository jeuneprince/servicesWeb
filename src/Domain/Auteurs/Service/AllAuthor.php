<?php

namespace App\Domain\Auteurs\Service;

use App\Domain\Auteurs\Repository\AllAuthorRepository;
use App\Exception\ValidationException;
use App\Factory\LoggerFactory;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

/**
 * Service.
 */
final class AllAuthor
{
    /**
     * @var AllAuthorRepository
     */
    private $repository;
    private $logger;
    /**
     * The constructor.
     *
     * @param AllAuthorRepository $repository The repository
     * @param LoggerFactory $logger The logger
     *
     */
    public function __construct(AllAuthorRepository $repository, LoggerFactory $logger)
    {
        $this->repository = $repository;
        $this->logger = $logger
            ->addFileHandler('Createauthor.log')
            ->createLogger();

    }

    /**
     * Create a new user.
     *
     * @param array $data The form data
     *
     * @return int The new author ID
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

    public function showAuthor() : array {
        return $this->repository->selectAllAuthor();
    }
}
