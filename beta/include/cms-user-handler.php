<?php
    include_once 'db.php';

    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $role = mysqli_real_escape_string($connection, $_POST['role']);

    $query = "INSERT INTO users (name, username, password, role)
    VALUES ('$name','$username','$password','$role');";
    mysqli_query($connection, $query);

    header("Location: ../admin/cms-users.php");
?>