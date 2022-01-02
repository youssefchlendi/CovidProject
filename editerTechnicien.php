<?php

session_start();
//DB conncetion
include_once('includes/config.php');
//validating Session
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
   
    if(isset($_POST['update'])){
        $tid=intval($_GET['tid']);    
        $empid=$_POST['empid'];
        $fname=$_POST['fullname'];
        $mnumber=$_POST['mobilenumber'];
         include './classes/Technicien.php';

            $technicien = new Technicien();
            $technicien->edit($fname, $mnumber, $tid);
          echo '<script>alert("Le technicien a été mis à jour")</script>';
          echo "<script>window.location.href='gererTechniciens.php'</script>";
     
    
  }
}
$template = 'editerTechnicien';
    $pageTitle = 'Editer technicien';
    include './layout.phtml';

?>