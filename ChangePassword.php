<?php
    include 'includes/config.php';
    session_start();

    if (strlen($_SESSION['aid']==0)) {
        header('location:logout.php');
    }
    else{
       if (isset($_POST['submit'])){
           $adminID=$_SESSION['aid'];
           $currentPass=$_POST['currentPass'];
           $newPass=$_POST['newPass'];
           $confirmPass=$_POST['confirmPass'];
           $idAd=intval($adminID['id']);
           include './classes/Admin.php';

           $adminGet = new Admin();
           $admin=$adminGet->getAdminByIdPass($idAd, $currentPass);
           //$queryAd = $pdo->query("SELECT id from admin where id='$idAd' and password='$currentPass'");
           //$admin = $queryAd->fetch();
           if (count($admin)>0){
             if ($newPass==$confirmPass){
                 $queryChange=$pdo->query("UPDATE admin set password='$confirmPass'");
                 echo "<script>alert('Mot de passe changé avec succés!')</script>";
                 echo "<script>window.location.href='loginAdmin.php'</script>";
                
             }
             else {
                 echo "<script>alert('Veuillez saisir un mot de passe correct')</script>";
             }
           }
           else {
            echo "<script>alert('Le mot de passe est incorrecte')</script>";
           }
       }
    }
    $template = 'ChangePassword';
    $pageTitle = 'Changer le mot de passe';
    include './layout.phtml';


?>