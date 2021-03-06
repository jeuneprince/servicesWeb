<?php

namespace App\Domain\Auteurs\Repository;

use PDO;

/**
 * Repository.
 */
class AllAuthorRepository
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
     * Show author row.
     *
     * @param array $author The author
     *
     * @return int The new ID
     */
    public function selectAllAuthor(): array
    {
        $sql = "SELECT * FROM auteurs";
        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

