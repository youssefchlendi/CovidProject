<?php

include_once 'DataBase.php';

class TypeTest
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new DataBase();
    }
    /**
     * Get a type test by name
     *
     * @param name $Name
     * @return array $typeTest
     */
    public function get(string $Name): array
    {
        $sql = 'SELECT * FROM typetest WHERE nomTest = :Name';
        $query = $this->pdo->launchQuery($sql, ['Name' => $Name]);
        return $query->fetch();
    }
    public function getAll(): array
    {
        $sql = 'SELECT * from typetest';
        $query = $this->pdo->launchQuery($sql, []);
        return $query->fetchAll();
    }

   
}
