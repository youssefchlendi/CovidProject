<?php
    include 'includes/config.php';
    
    include './classes/Test.php';
    include './classes/Patient.php';
    include './classes/Technicien.php';
    //$technicien = new Technicien();
    //$technicienAdded = $technicien->create($idEmpl,$name, $PhoneNum,$dat);
   
    //Nombre des tests totale
    $test = new Test();
    $totaltest= $test->getNumberTests();
    //var_dump($totaltest);
    //$query=$pdo->query("SELECT count(*) from tests");
    //$totaltest=$query->fetch();
    

    //Tests affectés à des laboratoires 
    //$query1=$pdo->query("SELECT count(*) from tests where assigned is not null");
    //$totalassigned=$query1->fetch();
    $totalassigned=$test->getNumberTestsAssigned();
    //Tests delivrés aux patients
    /*$query5=$pdo->query("SELECT count(*) from tests where resultat is not null ");
    $totaldelivered=$query5->fetch();*/
    $totaldelivered=$test->getNumberDeliveredTests();

    //Nombre totale des patients enregistrés
    $patient = new Patient();
    $totalpatients = $patient->getNumberPatient();
    //$query6=$pdo->query("SELECT count(*) from patients");
    //$totalpatients=$query6->fetch(); 

    //Nombre totale des techniciens de laboratoire
    /*$query7=$pdo->query("SELECT count(*) from techniciens");
    $totalphlebotomist=$query7->fetch();*/
    $technicien = new Technicien();
    $totalphlebotomist=$technicien->getNumberTechnicien();

    $template = 'dashboard';
    $pageTitle = 'Tableau de bords';
    session_start();
    if (strlen($_SESSION['aid']==0)) {
      header('location:logout.php');
      } else{
    include './layout.phtml';
      }

?>