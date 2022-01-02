<?php
    include 'includes/config.php';
    

    //Nombre des tests totale
    $query=$pdo->query("SELECT count(*) from tests");
    $totaltest=$query->fetch();
    

    //Tests affectés à des laboratoires 
    $query1=$pdo->query("SELECT count(*) from tests where assigned is not null");
    $totalassigned=$query1->fetch();

    //Tests delivrés aux patients
    $query5=$pdo->query("SELECT count(*) from tests where resultat is not null ");
    $totaldelivered=$query5->fetch();

    //Nombre totale des patients enregistrés
    $query6=$pdo->query("SELECT count(*) from patients");
    $totalpatients=$query6->fetch(); 

    //Nombre totale des techniciens de laboratoire
    $query7=$pdo->query("SELECT count(*) from techniciens");
    $totalphlebotomist=$query7->fetch();

    $template = 'dashboard';
    $pageTitle = 'Tableau de bords';
    session_start();
    if (strlen($_SESSION['aid']==0)) {
      header('location:logout.php');
      } else{
    include './layout.phtml';
      }

?>