<?php

namespace App\Domain\Livre\Repository;

use PDO;

/**
 * Repository.
 */
class LivreDeleteRepository
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
    public function deleteLivre(int $id): bool
    {
        $params = [
            'id' => $id // tu dois aussi ajouter le livreID dans les paramêtres
        ];
        $sql = " DELETE FROM livres
          WHERE id = :id;";

        $query = $this->connection->prepare($sql);
        $result = $query->execute($params);
        return $result;
    }
}

