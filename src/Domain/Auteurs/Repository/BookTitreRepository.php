<?php

namespace App\Domain\Livre\Repository;

use PDO;

/**
 * Repository.
 */
class BookTitreRepository
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
     * Show livre row.
     *
     * @param array $livre The livre
     *
     * @return int The new ID
     */

    public function selectBookTitre($titre): array
    {
        $sql = "SELECT * FROM livres where titre = :titre";
        $query = $this->connection->prepare($sql);
        $query->execute(array('titre'=>$titre));
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

