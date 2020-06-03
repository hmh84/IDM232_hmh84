<?php
    include_once 'db.php';

    $id = mysqli_real_escape_string($connection, $_POST['id']);

    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $role = mysqli_real_escape_string($connection, $_POST['role']);

    $query =
        "UPDATE users 
        SET 
            name = '$name',
            username = '$username',
            password = '$password',
            role = '$role'
        WHERE
            id = '$id';";

    mysqli_query($connection, $query);
    
    $result = mysqli_query($connection, $query);
    
    if ($result) {
            header("Location: ../admin/cms-users.php");
        } else {
            echo 'Failed to add recipe.';
        }
?>