<?php

namespace App\Domain\Livre\Repository;

use PDO;

/**
 * Repository.
 */
class BookIdRepository
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

    public function selectBookID($id): array
    {
        $sql = "SELECT * FROM livres where id = :id";
        $query = $this->connection->prepare($sql);
        $query->execute(array('id'=>$id));
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

