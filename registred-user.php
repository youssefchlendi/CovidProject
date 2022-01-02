<?php 

//DB conncetion
include_once('includes/config.php');
include './classes/TypeTest.php';
$type = new TypeTest();
$typeTest = $type->getAll();

//$queryTyp=$pdo->prepare("SELECT * from typetest ");
//$queryTyp->execute();
//$typeTest = $queryTyp->fetchall();
if ( isset($_POST['testtype'])&& isset($_POST['fhd'])){
    $cin=$_POST['cin'];
    $testtype=$_POST['testtype'];
    $fhd=$_POST['fhd'];
        include './classes/Test.php';
        include './classes/TypeTest.php';
        $test = new Test();
        $typTest = new TypeTest();
        $idType = $typTest->get($testtype);
        $id = $test->create($cin, $fhd, $dat, $idType['id']);

   // $query=$pdo->query("INSERT into tests(patient_cin,TestTimeSlot,RegistrationDate,typeTest) values('$cin','$fhd','$dat','$testtype');");
}
if(isset($_POST['search'])){
    $cnumber=intval($_POST['regcinnumber']);
    $sql = "select * from patients where cin=:cin ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["cin"=>$cnumber]);
    $row=$stmt->rowCount();
}
$template = 'registred-user';
    $pageTitle = 'registred  patient';
    include 'registred-user.phtml'

?>