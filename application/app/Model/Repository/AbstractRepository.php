<?php

namespace App\Model\Repository;

abstract class AbstractRepository
{
    
    /**
     * @var PDO
     */
    protected $db;
    
    public function __construct(\PDO $pdo)
    {
        $this->db = $pdo;
    }
}
