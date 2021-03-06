<?php

namespace App\Domain\Auteurs\Repository;

use PDO;

/**
 * Repository.
 */
class AuteurDeleteRepository
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
     * Insert auteur row.
     *
     * @param array $auteur The auteur
     *
     * @return int The new ID
     */
    public function deleteAuteur(int $id): bool
    {
        $params = [
            'id' => $id // tu dois aussi ajouter le auteurID dans les paramêtres
        ];
        $sql = " DELETE FROM auteurs
          WHERE id = :id;";

        $query = $this->connection->prepare($sql);
        $result = $query->execute($params);
        return $result;
    }
}

