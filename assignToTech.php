<?php
    include 'includes/config.php';

    session_start();
    if (strlen($_SESSION['aid']==0)) {
        header('location:logout.php');
    } 
    else{
        $QueryAssignedTests = $pdo->query("SELECT * FROM tests join patients on tests.patient_cin=patients.cin join typetest typ on tests.typeTest=typ.id where tests.assigned=1");
        $AssignedTests=$QueryAssignedTests->fetchall();
    }

    
    $template = 'assignToTech';
    $pageTitle = 'Tests affectés à des techniciens';
    include './layout.phtml';





?>