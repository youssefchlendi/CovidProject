<?php
    include './includes/config.php';
    $query = $pdo->query('SELECT * from admin');
    $admin = $query->fetchAll();
    
    $template = 'index';
    $pageTitle = "Covid-19 Testing Management System";
    include './layout.phtml';
?>

