<?php
    include_once 'db.php';

    $id = mysqli_real_escape_string($connection, $_POST['id']);

    $query = "DELETE FROM users WHERE id = $id;";

    if (mysqli_query($connection, $query)) {
        mysqli_query($connection, $query);
        header("Location: ../admin/cms-users.php");
        exit;
    } else {
        echo "Error deleting user";
    }
?>