<?php
    include_once 'db.php';

    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $subtitle = mysqli_real_escape_string($connection, $_POST['subtitle']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $cook_time = mysqli_real_escape_string($connection, $_POST['cook_time']);
    $cal_per_serving = mysqli_real_escape_string($connection, $_POST['cal_per_serving']);
    $protein = mysqli_real_escape_string($connection, $_POST['protein']);
    $main_img = mysqli_real_escape_string($connection, $_POST['main_img']);
    $ingredients_img = mysqli_real_escape_string($connection, $_POST['ingredients_img']);
    $step_imgs = mysqli_real_escape_string($connection, $_POST['step_imgs']);
    $all_ingredients = mysqli_real_escape_string($connection, $_POST['all_ingredients']);
    $all_steps = mysqli_real_escape_string($connection, $_POST['all_steps']);
    $how_to_name = mysqli_real_escape_string($connection, $_POST['how_to_name']);
    $how_to_desc = mysqli_real_escape_string($connection, $_POST['how_to_desc']);

    $query = "INSERT INTO recipes (title, subtitle, description, cook_time, cal_per_serving,
    protein, main_img, ingredients_img, step_imgs, all_ingredients, all_steps, how_to_name,
    how_to_desc)
    VALUES ('$title','$subtitle','$description','$cook_time','$cal_per_serving',
    '$protein','$main_img','$ingredients_img','$step_imgs','$all_ingredients','$all_steps'
    ,'$how_to_name','$how_to_desc');";
    mysqli_query($connection, $query);

    header("Location: ../admin/cms-recipes.php");
?>