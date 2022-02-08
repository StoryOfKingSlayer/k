<?php

include_once('db.php');
session_start();

if (!empty($_POST['pass']) & !empty($_POST['email'])) {
    $login = $_POST['email'];
    $password = $_POST['pass'];

    $query = "SELECT * FROM `contacts` WHERE `email`='$login' AND `pass`='$password'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user'] = [
            "email" => $user['email'],
        ];
        header('Location: ../../index.php');
        exit;
        
    } else {
        header('Location: ../../auth.php');
        echo  "Неверный логин или пароль";

    }
}
