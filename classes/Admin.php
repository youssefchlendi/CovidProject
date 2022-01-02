<?php

include_once 'DataBase.php';

class Admin
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

    /**
     * Get an admin by id
     *
     * @param int $id
     * @return array $admin
     */
    public function get(int $id): array
    {
        $sql = 'SELECT * from admin where id= :id';
        $query = $this->pdo->launchQuery($sql, ['id' => $id]);
        return $query->fetch();
    }

   
    public function create(int $idEmpl, string $name, string $PhoneNum, string $dat): int
    {
         
        $sql = "INSERT INTO techniciens(techID,FullName,MobilePhone,dateRegistration) VALUES (?, ?, ?, ?)";
        $this->pdo->launchQuery($sql, [$idEmpl,$name,$PhoneNum,$dat]);
      
        return $this->pdo->lastInsertId();
    }

   
    public function getAdminByIdPass(int $id, string $pass): array
    {
           
        $sql = "SELECT id from admin where id=? and password=?";
        $query=$this->pdo->launchQuery($sql, [$id,$pass]);
        return $query->fetch();
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
    public function editPass(string $userName, string $mobNumber, string $pass): void
    {
       
        $sql = "UPDATE admin
                SET
                    password = ? 
                
                WHERE userName = ? && mobilePhone = ?";
          
        $pdoStat = $this->pdo->launchQuery($sql, [$pass,$userName, $mobNumber]);
     
        
    }

    public function ChangePass(string $Password): void 
    {
       // $queryChange=$pdo->query("UPDATE admin set password='$confirmPass'");
        $sql = "UPDATE admin
                SET
                    password = ? 
               ";
          
        $pdoStat = $this->pdo->launchQuery($sql, [$Password]);
     
    }

    
   
    
}
