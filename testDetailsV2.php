<?php
    session_start();
    include 'includes/config.php';

             //Code for Assign to
             if (isset($_POST['submit'])) {
                $testid=$_GET['tid'];    
                $assignto=$_POST['tech'];
                $assignedStatut = 1;
                $AssignedTech = $pdo->query("SELECT techID from techniciens where FullName='$assignto'");
                $IDAssignedTech = $AssignedTech->fetch();
                $IdTech = intval($IDAssignedTech[0]);
             
                $assigntime = date( 'Y-m-d');
                $QueryAssign = $pdo->query("UPDATE tests set assigned='$assignedStatut', tech_id='$IdTech',assignedTime='$assigntime' where id='$testid'");
                echo '<script>alert("Patient affecté à un technicien.")</script>';
               
            }

    /*Récupération des données de test*/
    $query = $pdo->prepare("SELECT * from tests t where t.id=?");
    $query->execute([$_GET['tid']]);
    $dataTests = $query->fetch();
    
   /*Récupération de type de test*/
    $typeTest=$dataTests['typeTest'];
    $queryTyp=$pdo->prepare("SELECT * from typetest where $typeTest=id");
    $queryTyp->execute();
    $typeTest = $queryTyp->fetch();

    /**Récupération des données de patients */
    $cinP=$dataTests['patient_cin'];
    $queryP=$pdo->prepare("SELECT * from patients p where $cinP=p.cin");
    $queryP->execute();
    $dataPatients = $queryP->fetch();
  
    /**Récupération des données de techniciens */
    if ($dataTests['assigned']==1){

        $idTech = $dataTests['tech_id'];
       $queryTech = $pdo->prepare("SELECT * from techniciens where techID=$idTech");
        $queryTech->execute();
        $dataTech = $queryTech->fetch();
    }
    
    /**Récupértion des données des techniciens */
        $queryTech = $pdo->query("SELECT * FROM techniciens");
        $techniciens = $queryTech->fetchAll();
   
    $template = 'TestDetailsV2';
    $pageTitle = 'Details des tests';
    include './layout.phtml';





?>