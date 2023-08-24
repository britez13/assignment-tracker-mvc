<?php 
    $dsn = 'mysql:host=localhost;dbname=assignment_tracker';
    $username = 'root';

    try {
        $db = new PDO($dsn, $username);
    } catch ( PDOException $e ) {
        $error = "Database Error";
        $error -= $e->getMessage();
        // What does this line
        include('view/error.php');
        exit();
    }