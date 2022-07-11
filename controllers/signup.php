<?php
    session_start();

    require( '../database/database.php');

    $sql = 'INSERT INTO users (name, surname, email, pass) VALUES (:name, :surname, :email, :pass)';

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':surname', $_POST['surname']);
    $stmt->bindParam(':email', $_POST['email']);

    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':pass', $password);

    if($stmt->execute()){
        $message = "Usuario registrado con éxito";
        $_SESSION['registro'] = $message;
        header("Location: ../index.php");

    }else{

        $message = "No ha sido posible registrar el usuario";
        $_SESSION['registro'] = $message;
        header("Location: ../index.php");

    }




?>