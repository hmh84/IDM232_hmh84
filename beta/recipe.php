<?php
    include_once 'include/db.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM recipes WHERE id={$id};";
    $result_s = mysqli_query($connection, $sql);
    $resultCheck = mysqli_num_rows($result_s);
    if ($resultCheck > 0) {
        if ($row_s = mysqli_fetch_assoc($result_s)) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlueBook - <?php echo $row_s['title'].' '.['subtitle'] ?></title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<style>
    body {
        padding: 3vw;
}
    div#modal-recipe {
        margin: auto;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
    div#modal-recipe, .modal-hero img {
        border-radius: 0;
}
</style>
<body>
    

    <div class="modal-content" id="modal-recipe">
        <div class="modal-hero">
                <img id="recipe-hero" src="graphics/modal-heros/<?php echo $row_s['main_img']; ?>" alt="Recipe Photo">
            </div>
            <div class="modal-content-main">
                <h1 id="recipe-title"><?php echo $row_s['title']; ?></h1>
                <h2 id="recipe-subtitle"><?php echo $row_s['subtitle']; ?></h2>
                <div id="recipe-stats">
                <p id="recipe-cook-time">Cook Time: <?php echo $row_s['cook_time']; ?>min</p>
                <p id="recipe-serving-count">Servings: <?php echo $row_s['servings']; ?></p>
                <p id="recipe-cals-per-serving">Calories/Serving: <?php echo $row_s['cal_per_serving']; ?></p>
            </div>
            <p id="recipe-desc"><?php echo $row_s['description']; ?></p>
            <img id="recipe-ing-img" src="graphics/ingredients/<?php echo $row_s['ingredients_img']; ?>" alt="Ingredients Photo">
            <div id="recipe-ings">

                <?php
                    $ingredString = $row_s['all_ingredients'];
                    $ingredArray = explode('*', $ingredString);

                    for ($loop = 0; $loop < count($ingredArray); $loop++) {
                        $oneIngred = $ingredArray[$loop];
                        echo "<p>".$oneIngred."</p>";
                    }
                ?>
            </div>

            <?php
                    $stepImgString = $row_s['step_imgs'];
                    $stepImgArray = explode('*', $stepImgString);

                    $stepString = $row_s['all_steps'];
                    $stepArray = explode('*', $stepString);

                    $stepDescString = $row_s['all_steps'];
                    $stepDescArray = explode('*', $stepDescString);

                    for ($loop = 0; $loop < count($stepImgArray); $loop++) {
                        $oneStepImg = $stepImgArray[$loop];
                        $oneStepTitle = $stepArray[$loop*2];
                        $oneStepDesc = $stepArray[$loop*2+1];
                        echo "<img src='graphics/steps/{$oneStepImg}' alt='Step {$loop} Photo'></img>";
                        echo "<h2>{$oneStepTitle}</h2>";
                        echo "<p>{$oneStepDesc}</p>";
                    }
                ?>
            <h1>Enjoy!</h1>
        </div>
    </div>
<?php
        }
    }
?>

</body>
</html>