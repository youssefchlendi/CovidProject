<?php

include_once 'DataBase.php';

class Patient
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new DataBase();
    }

    
    public function getAll(): array
    {
        $sql = 'SELECT * FROM techniciens';
        $query = $this->pdo->launchQuery($sql, []);
        return $query->fetchAll();
    }
   
    public function verifyAdmin(string $adminName, string $password): array
    {
        $sql = 'SELECT id from admin where userName=? and password=? ';
        $query = $this->pdo->launchQuery($sql, [$adminName,$password]);
        return $query->fetchAll();
    }

    
    public function get(int $id): array
    {
        $sql = 'SELECT * from admin where id= :id';
        $query = $this->pdo->launchQuery($sql, ['id' => $id]);
        return $query->fetch();
    }

   
    public function create(string $fullname, string $mobilePhone, string $dob, string $cin,string $adress,string $state,string $dat): int
    {
       
        $sql = "INSERT INTO patients (FullName,mobile,dateannif,cin,adresse,state,registrationDate) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $this->pdo->launchQuery($sql, [$fullname,$mobilePhone,$dob,$cin,$adress,$state,$dat]);
      
        return $this->pdo->lastInsertId();
    }

    
    public function edit(string $mail, string $mobNumber,int $adminID): void
    {
      
        $sql = "UPDATE admin
                SET
                    mail = ?,
                    mobilePhone = ?
                WHERE id = ?";
          
        $pdoStat = $this->pdo->launchQuery($sql, [$mail, $mobNumber, $adminID]);
      
        
    }

   
   public function remove(int $pid): void
    {
        $sql = 'DELETE FROM techniciens WHERE id = :id';
        $this->pdo->launchQuery($sql, ['id' => $pid]);

    }
    public function getNumberPatient():string 
    {
        //SELECT count(*) from tests where assigned is not null
         $sql = " SELECT count(*) from patients";
         $query=$this->pdo->launchQuery($sql, []);
         $value=$query->fetch();
         return $value['count(*)'];
    
    }
    
}
