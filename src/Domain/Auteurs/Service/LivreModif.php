<?php

namespace App\Domain\Livre\Service;

use App\Domain\Livre\Repository\LivreModifRepository;
use App\Exception\ValidationException;
use App\Factory\LoggerFactory;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

/**
 * Service.
 */
final class LivreModif
{
    /**
     * @var LivreModifRepository
     */
    private $repository;
    private $logger;
    /**
     * The constructor.
     *
     * @param LivreModifRepository $repository The repository
     * @param LoggerFactory $logger The logger
     *
     */
    public function __construct(LivreModifRepository $repository, LoggerFactory $logger)
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
    public function updateLivre(array $data, int $livreid): bool
    {
        // Input validation
        $this->validateNewLivre($data);

        // update book
        $id = $this->repository->updateLivre($data, $livreid);

        //Logging here: Livre created successfully
        $this->logger->info(sprintf('Livre created successfully: %s', $id));

        return $id;
    }

    /**
     * Input validation.
     *
     * @param array $data The form data
     *
     * @throws ValidationException
     *
     * @return void
     */
    private function validateNewLivre(array $data): void
    {
        $errors = [];

        // Here you can also use your preferred validation library

        if (empty($data['titre'])) {
            $errors['titre'] = 'Input required';
        }

        if (empty($data['isbn'])) {
            $errors['isbn'] = 'Input required';
        }

        if (empty($data['Genre_id'])) {
            $errors['Genre_id'] = 'Input required';
        }

        if ($errors) {
            throw new ValidationException('Please check your input', $errors);
        }
    }
}
