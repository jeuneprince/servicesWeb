<?php

namespace App\Domain\Livre\Repository;

use PDO;

/**
 * Repository.
 */
class LivreModifRepository
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
    public function updateLivre(array $livre,  int $id): bool
    {
        $params = [
            'titre' => $livre['titre'],
            'isbn' => $livre['isbn'],
            'Genre_id' => $livre['Genre_id'],
            'id' => $id // tu dois aussi ajouter le livreID dans les paramêtres
        ];

        $sql = "UPDATE livres SET 
                    titre=:titre, 
                    isbn=:isbn, 
                    Genre_id=:Genre_id 
          WHERE id = :id;";

        $query = $this->connection->prepare($sql);
        $result = $query->execute($params);
        return $result;
    }
}

