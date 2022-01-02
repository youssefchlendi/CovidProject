<?php

    include 'includes/config.php';
    session_start();

    if (strlen($_SESSION['aid']==0)) {
        header('location:logout.php');
    } 
    else {
      
        $adminID = $_SESSION['aid'];
        include './classes/Admin.php';
       
        $Getadmin = new Admin();
        $admin = $Getadmin->get($adminID["id"]);
     
        if (isset($_POST['update'])){
            $email=$_POST['email'];
            $mobNumber= $_POST['mobilenumber'];
           $Getadmin->edit($email,$mobNumber,$adminID["id"]);
           header('location:profile.php');
        }
      
    }
    $template = 'Profile';
    $pageTitle = 'Profil';
    include './layout.phtml';





?>