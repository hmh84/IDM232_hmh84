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
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous">
    </script>
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
    <?php
        if (!$row_s['how_to_link'] == '') {
    ?>
    <div class="modal-close" style="top: 27%; display: none;"><span></span><span></span></div>
    <?php
        }
    ?>
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

            if (!$row_s['how_to_name'] == '') {

                $how_to_img = $row_s['how_to_img'];
                $how_to_title = $row_s['how_to_name'];
                $how_to_desc = $row_s['how_to_desc'];

                echo "<div id=\"how-to-info\">";
                echo     "<img id=\"how-to-img\" src=\"graphics/how-to/{$how_to_img}\" alt=\"How-To Photo\">";
                if (!$row_s['how_to_link'] == '') {
                echo    '<svg id="video-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs/><path d="M256 0a256 256 0 101 513 256 256 0 00-1-513zm102 265l-150 96a11 11 0 01-10 0c-4-2-6-5-6-9V160a11 11 0 0116-9l150 96c3 2 5 5 5 9s-2 7-5 9z"/></svg>';
                }
                echo     "<div id=\"how-to-info-content\">";
                echo         "<h2>{$how_to_title}</h2>";
                echo         "<p>{$how_to_desc}</p>";
                echo     '</div>';
                echo '</div>';
            }

            ?>

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
                        echo "<h2>Step #{$oneStepTitle}</h2>";
                        echo "<p>{$oneStepDesc}</p>";
                    }
                ?>
            <h1>Enjoy!</h1>
        </div>
    </div>
    <?php
        if (!$row_s['how_to_link'] == '') {
    ?>
    <div class="modal-content" id="modal-video" style="display: none;">
    <iframe
        src="<?php echo $row_s['how_to_link']; ?>"
        width="560" height="315"
        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
    </iframe>
    </div>
    <?php
        }
    ?>

<?php
        }
    }
?>
<script src="js/recipe.js"></script>
</body>
</html>