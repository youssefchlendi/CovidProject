<?php

include_once 'DataBase.php';

class Technicien
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new DataBase();
    }

    /**
     * Get all technicien
     *
     * @return array $techniciens
     */
    public function getAll(): array
    {
        $sql = 'SELECT * FROM techniciens';
        $query = $this->pdo->launchQuery($sql, []);
        return $query->fetchAll();
    }

    /**
     * Get a technicien by id
     *
     * @param int $id
     * @return array $technicien
     */
    public function get(int $id): array
    {
        $sql = 'SELECT * FROM technicien WHERE id = :id';
        $query = $this->pdo->launchQuery($sql, ['id' => $id]);
        return $query->fetch();
    }

    /**
     * Create a new technicien
     *
     * @param int $idEmpl
     * @param string $name
     * @param string $PhoneNum
     *  @param string $dat
     * @return int $id
     */
    public function create(int $idEmpl, string $name, string $PhoneNum, string $dat): int
    {
          
        $sql = "INSERT INTO techniciens(techID,FullName,MobilePhone,dateRegistration) VALUES (?, ?, ?, ?)";
        $this->pdo->launchQuery($sql, [$idEmpl,$name,$PhoneNum,$dat]);
       
        return $this->pdo->lastInsertId();
    }

    /**
     * Update a todo
     * 
     * @param string $fname
     * @param string $mnumber
     * @param int $tid
     * @return void
     */
    public function edit(string $fname, string $mnumber,int $tid): void
    {
       $sql = "UPDATE techniciens
                SET
                    FullName = ?,
                    MobilePhone = ?
                WHERE id = ?";
         
        $pdoStat = $this->pdo->launchQuery($sql, [$fname, $mnumber, $tid]);
     
        
    }

    /**
     * Delete a technicien
     *
     * @param integer $pid
     * @return void
     */
   public function remove(int $pid): void
    {
       
        $sql = 'DELETE FROM techniciens WHERE id = :id';
        $this->pdo->launchQuery($sql, ['id' => $pid]);

    }
    
}
