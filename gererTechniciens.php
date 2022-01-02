<?php
    include './includes/config.php';
    session_start();
    //DB conncetion
   
    error_reporting(0);
    include './classes/Technicien.php';

    $Technicien = new Technicien();
    //validating Session
    if (strlen($_SESSION['aid']==0)) {
      header('location:logout.php');
      } else{
    
     if($_GET['action']=='delete'){    
    $pid=intval($_GET['pid']);  
    include './classes/Technicien.php';

    $Technicien = new Technicien();
    
    $Technicien->remove($pid);
    
    
    echo '<script>alert("Technicien supprimé")</script>';
      echo "<script>window.location.href='gererTechniciens.php'</script>";
    }
   // $query1 = $pdo->query("SELECT * FROM techniciens");
   // $techniciens = $query1->fetchAll();
   $techniciens = $Technicien->getAll();
    $template = 'gererTechniciens';
    $pageTitle = "Gérer techniciens";
    include './layout.phtml';


      }


?>