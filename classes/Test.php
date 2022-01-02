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

  

}
