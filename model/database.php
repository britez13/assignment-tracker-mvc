<?php 
    $dsn = 'mysql:host=localhost;port=3307;dbname=assignment_tracker';
    $username = 'root';
    // $pass = 'pass';

    try {
        $db = new PDO($dsn, $username);
    } catch ( PDOException $e ) {
        $error = "Database Error";
        $error .= $e->getMessage();
        // What does this line
        include('view/error.php');
        exit();
    }