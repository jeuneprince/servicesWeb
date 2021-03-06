<?php

namespace App\Domain\Livre\Repository;

use PDO;

/**
 * Repository.
 */
class LivreCreatorRepository
{
    /**
     * @var PDO The database connection
     */
    private $connection;

    /**
     * Constructor.
     *
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Insert livre row.
     *
     * @param array $livre The livre
     *
     * @return int The new ID
     */
    public function insertLivre(array $livre): int
    {
        $row = [
            'titre' => $livre['titre'],
            'isbn' => $livre['isbn'],
            'Genre_id' => $livre['Genre_id'],
        ];

        $sql = "INSERT INTO livres SET 
                titre=:titre, 
                isbn=:isbn, 
                Genre_id=:Genre_id;";

        $this->connection->prepare($sql)->execute($row);

        return (int)$this->connection->lastInsertId();
    }
}

