<?php

    session_start();

    require('../database/database.php');

    $userData = $conn->prepare("SELECT * FROM users WHERE email =:email");

    $userData->bindParam(':email', $_POST['email']);
    $userData->execute();

    $results = $userData->fetch(PDO::FETCH_ASSOC);

    if(count($results) > 0 && password_verify($_POST['password'], $results['pass'])){
        $_SESSION['user_id'] = $results['id'];
        $_SESSION['user_name'] = $results['name'];
        $_SESSION['user_surname'] = $results['surname'];
        $_SESSION['user_email'] = $results['email'];
        header('location: ../menu.php');
    }else{

        $message = 'Lo siento, las credenciales no coinciden';
        $_SESSION['login'] = $message;
        header( 'location: ../index.php');

    }



?>