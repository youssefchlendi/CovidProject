<?php
    include 'includes/config.php';
   
    session_start();
  
    if (strlen($_SESSION['aid']==0)) {
        header('location:logout.php');
    } 
    else{
        
        $QuerynewTests = $pdo->query("SELECT * FROM tests join patients on tests.patient_cin=patients.cin join typetest typ on tests.typeTest=typ.id where assigned=0");
        $newTests=$QuerynewTests->fetchall();
       
       
        
    }

    
    $template = 'NewTests';
    $pageTitle = 'Nouveau tests';
    include './layout.phtml';





?>