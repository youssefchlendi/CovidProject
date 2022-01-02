<?php

include_once 'DataBase.php';

class Test
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new DataBase();
    }

    /**
     * Get all tests
     *
     * @return array $tests
     */
    public function getAll(): array
    {
        $sql = 'SELECT * FROM tests WHERE user_id= :id ';
        $query = $this->pdo->launchQuery($sql, ['id' => $_SESSION['aid']]);
        return $query->fetchAll();
    }

    /**
     * Get a tests by id
     *
     * @param int $id
     * @return array $test
     */
    public function get(int $id): array
    {
        $sql = 'SELECT * FROM tests WHERE id = :id';
        $query = $this->pdo->launchQuery($sql, ['id' => $id]);
        return $query->fetch();
    }

    /**
     * Create a new test
     *
     * @param int $patient_cin
     * @param string $TestTimeSlot
     * @param string $RegistationDate
     *  @param int $typeTest
     * @return int $id
     */
    public function create(int $patient_cin, string $TestTimeSlot, string $RegistationDate, int $typeTest): int
    {
        $sql = "INSERT into tests(patient_cin,TestTimeSlot,RegistrationDate,typeTest) VALUES (?, ?, ?, ?)";
        $this->pdo->launchQuery($sql, [$patient_cin,$TestTimeSlot,$RegistationDate,$typeTest]);
      
        return $this->pdo->lastInsertId();
    }
    public function getNumberTests():string 
    {
         $sql = "SELECT count(*) from tests";
         $query=$this->pdo->launchQuery($sql, []);
         $value=$query->fetch();
         return $value['count(*)'];
    
    }
    public function getNumberTestsAssigned():string 
    {
        //SELECT count(*) from tests where assigned is not null
         $sql = "SELECT count(*) from tests where assigned is not null";
         $query=$this->pdo->launchQuery($sql, []);
         $value=$query->fetch();
         return $value['count(*)'];
    
    }
    //$query5=$pdo->query("SELECT count(*) from tests where resultat is not null ");
    public function getNumberDeliveredTests():string 
    {
        //SELECT count(*) from tests where assigned is not null
         $sql = "SELECT count(*) from tests where resultat is not null ";
         $query=$this->pdo->launchQuery($sql, []);
         $value=$query->fetch();
         return $value['count(*)'];
    
    }
    public function editAssignedTests(int $assigned,int $idTech,date $assignedTime,int $testid):void
    {
       // $QueryAssign = $pdo->query("UPDATE tests set assigned='$assignedStatut', tech_id='$IdTech',assignedTime='$assigntime' where id='$testid'");
        $sql = "UPDATE tests
                SET
                    assigned = ?,
                    tech_id = ?,
                    assignedTime = ?
                WHERE id = ?";
         
        $pdoStat = $this->pdo->launchQuery($sql, [$assigned, $idTech, $assignedTime, $testid]);
     
    }


}
