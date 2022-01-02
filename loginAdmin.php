<?php

    /*Initialisation de la variable SESSION*/
    session_start();

    /*Connexion à la base de donnée*/
    include 'includes/config.php';

    
    
    
    if (isset($_POST['login'])){
        /*Récupération des données à partir du formulaire*/
        $adminName=$_POST["username"];
        $password=$_POST["inputpwd"];
        include './classes/Admin.php';

        $admin = new Admin();
        $adminVERIF = $admin->verifyAdmin($adminName,$password);
       
       if (count($adminVERIF)!=0){
           
         
           $_SESSION['aid']=$adminVERIF["0"];
          header('location:dashboard.php');
        }
        else {
            echo "<script>
            alert('Détails invalides. Prière de réessayer.')
            </script>";
    }
    
    }
    /*Lien avec le contenu html de la page*/
    $template = 'loginAdmin';
    $pageTitle = 'Login admin';
    include './layout.phtml';

    




?>