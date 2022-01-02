<?php
    include 'includes/config.php';
    
    session_start();
    if (strlen($_SESSION['aid']==0)) {
        header('location:logout.php');
    } 
    else{
    
        $query = $pdo->query("SELECT p.FullName, p.mobile, typ.nomTest, t.TestTimeSlot, t.RegistrationDate, t.id, p.cin 
        FROM patients p join tests t on p.cin = t.patient_cin 
        join typetest typ on t.typetest=typ.id ");
        
        $ttests = $query->fetchAll();
      

  } 
    $template = 'ToutsTest';
    $pageTitle = 'Touts les tests';
    include './layout.phtml';




?>