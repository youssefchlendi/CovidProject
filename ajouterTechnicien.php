<?php

    include 'includes/config.php';
    session_start();
    if (strlen($_SESSION['aid']==0)) {
        header('location:logout.php');
    } 
    else{
        if (isset($_POST['submit'])){
            $idEmpl = $_POST['empid'];
            $name = $_POST['fullname'];
            $PhoneNum = $_POST['mobilenumber'];
            date_default_timezone_set('Africa/Tunis');
            $dat = date('Y-m-d');
            include './classes/Technicien.php';

            $technicien = new Technicien();
            $technicienAdded = $technicien->create($idEmpl,$name, $PhoneNum,$dat);
            if ($technicienAdded) {
                echo '<script>alert("Technicien ajouté avec succés.")</script>';
                  echo "<script>window.location.href='ajouterTechnicien.php'</script>";
                } 
                else {
                    echo "<script>alert('Quelque chose s'est mal passé. Veuillez réessayer.');</script>";  
                echo "<script>window.location.href='ajouterTechnicien'</script>";
                }
        }
    }
      








    $template = 'ajouterTechnicien';
    $pageTitle = 'Ajouter technicien';
    include './layout.phtml';





?>