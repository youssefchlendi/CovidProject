<?php  
session_start();
//DB conncetion

include_once('includes/config.php');

    //$queryTyp=$pdo->prepare("SELECT * from typetest ");
    //$queryTyp->execute();
    //$typeTest = $queryTyp->fetchall();
    include './classes/TypeTest.php';
    $type = new TypeTest();
    $typeTest = $type->getAll();

   
if (isset($_POST['submit']))
    {
      $fullname=$_POST['fullname'];
      $mobilePhone=$_POST['mobilePhone'];
      $dob=$_POST['dob'];
      $cin=$_POST['cin'];
      $adress=$_POST['address'];
      $state=$_POST['state'];
      $testtype=$_POST['testtype'];
       $fhd=$_POST['fhd'];
       $dat=date( 'Y-m-d');
      if ( isset($fullname)){
        include './classes/Test.php';
        include './classes/TypeTest.php';
        include './classes/Patient.php';
        $test = new Test();
        $typTest = new TypeTest();
        $patient = new Patient();
        $idType = $typTest->get($testtype);
        $id = $test->create($cin, $fhd, $dat, $idType['id']);
        $result=$patient->create($fullname,$mobilePhone,$dob,$cin,$adress,$state,$dat);
      }
    }

   
    $template = 'new-user';
    $pageTitle = 'Nouveau patient';
    include './layout.phtml';

?>