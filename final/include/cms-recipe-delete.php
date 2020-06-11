<?php
    include_once 'db.php';

    $id = mysqli_real_escape_string($connection, $_POST['id']);

    $query = "DELETE FROM recipes WHERE id = $id;";

    if (mysqli_query($connection, $query)) {
        mysqli_query($connection, $query);
        header("Location: ../admin/cms-recipes.php");
        exit;
    } else {
        echo "Error deleting recipe";
    }
?>