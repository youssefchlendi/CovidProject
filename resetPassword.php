<?php
    include 'includes/config.php';
    $template = 'resetPassword';
    $pageTitle = 'Mot de passe oublié';

    include './layout.phtml';
    if(isset($_POST['submit']))
    {
    $contactno=$_POST['contactno'];
    $username=$_POST['username'];
    $password=$_POST['newpassword'];
    include './classes/Admin.php';

    $admin = new Admin();
    
     $admin->editPass($username,$contactno,$password);
    echo "<script>alert('Password successfully changed');</script>";
    echo "<script>window.location.href='loginAdmin.php'</script>";   
      
        
        }
       


?>