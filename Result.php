<?php
    include 'includes/config.php';

    session_start();
    if (strlen($_SESSION['aid']==0)) {
        header('location:logout.php');
    } 
    else{
        $QueryResult = $pdo->query("SELECT * FROM tests join patients on tests.patient_cin=patients.cin join typetest typ on tests.typeTest=typ.id where resultat is not NULL");
        $Result=$QueryResult->fetchall();
    }

    
    $template = 'Result';
    $pageTitle = 'Résultat fourni au patient';
    include './layout.phtml';





?>