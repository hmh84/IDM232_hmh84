<?php
    include_once 'db.php';

    $id = mysqli_real_escape_string($connection, $_POST['id']);

    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $subtitle = mysqli_real_escape_string($connection, $_POST['subtitle']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $cook_time = mysqli_real_escape_string($connection, $_POST['cook_time']);
    $servings = mysqli_real_escape_string($connection, $_POST['servings']);
    $cal_per_serving = mysqli_real_escape_string($connection, $_POST['cal_per_serving']);
    $protein = mysqli_real_escape_string($connection, $_POST['protein']);
    $main_img = mysqli_real_escape_string($connection, $_POST['main_img']);
    $ingredients_img = mysqli_real_escape_string($connection, $_POST['ingredients_img']);
    $step_imgs = mysqli_real_escape_string($connection, $_POST['step_imgs']);
    $all_ingredients = mysqli_real_escape_string($connection, $_POST['all_ingredients']);
    $all_steps = mysqli_real_escape_string($connection, $_POST['all_steps']);
    $how_to_name = mysqli_real_escape_string($connection, $_POST['how_to_name']);
    $how_to_desc = mysqli_real_escape_string($connection, $_POST['how_to_desc']);

    if (isset($_POST['visibility'])) {
        $visibility = 'y';
    } else {
        $visibility = 'n';
    }

    $query =
        "UPDATE recipes 
        SET 
            title = '$title',
            subtitle = '$subtitle',
            description = '$description',
            cook_time = '$cook_time',
            servings = '$servings',
            cal_per_serving = '$cal_per_serving',
            protein = '$protein',
            main_img = '$main_img',
            ingredients_img = '$ingredients_img',
            step_imgs = '$step_imgs',
            all_ingredients = '$all_ingredients',
            all_steps = '$all_steps',
            how_to_name = '$how_to_name',
            how_to_desc = '$how_to_desc',
            visibility = '$visibility'
        WHERE
            id = '$id';";

    $result = mysqli_query($connection, $query);

if ($result) {
        header("Location: ../admin/cms-recipes.php");
    } else {
        echo 'Failed to add recipe.';
    }
?>