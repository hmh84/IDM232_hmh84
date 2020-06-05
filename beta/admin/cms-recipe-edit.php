<?php $directory_level = '../' ?>

<?php
    include_once '../include/db.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM recipes WHERE id={$id};";
    $result = mysqli_query($connection, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        if ($row = mysqli_fetch_assoc($result)) {
?>

<!DOCTYPE html>
<html lang="en" id="html">
<head>
    <meta charset="UTF-8">
    <title>BlueBook - Edit Recipe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/cms.css">
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
</head>
<body>

<!-- Header -->

<?php include_once '../include/header.php'; ?>

<!-- Main - Search & Filter -->

    <main>
        <h1>CMS - Edit Recipe: <?php echo "#".$row['id']." ".$row['title'] ?></h1>
        <div id="cms-wrapper">
            <div id="cms-form">
                <form action="../include/cms-recipe-editor.php" method="POST">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="<?php echo $row['title'] ?>">
                    
                    <label for="subtitle">Subtitle</label>
                    <input type="text" name="subtitle" value="<?php echo $row['subtitle'] ?>">
                    
                    <label for="description">Description</label>
                    <textarea type="text" name="description" tall><?php echo $row['description'] ?></textarea>
                    
                    <label for="cook_time">Cook Time</label>
                    <br>
                    <input type="text" name="cook_time" value="<?php echo $row['cook_time'] ?>" small>
                    <br>
                    
                    <label for="servings">Servings</label>
                    <br>
                    <input type="text" name="servings" value="<?php echo $row['servings'] ?>" small>
                    <br>
                    
                    <label for="cal_per_serving">Calories Per Serving</label>
                    <br>
                    <input type="text" name="cal_per_serving" value="<?php echo $row['cal_per_serving'] ?>" small>
                    <br>
                    
                    <label for="protein">Protein</label>
                    <br>
                    <input type="text" name="protein" value="<?php echo $row['protein'] ?>" small>
                    <br>
                    
                    <label for="main_img">Main Img File Name</label>
                    <input type="text" name="main_img" value="<?php echo $row['main_img'] ?>">
                    
                    <label for="ingredients_img">Ingredients File Name</label>
                    <input type="text" name="ingredients_img" value="<?php echo $row['ingredients_img'] ?>">
                    
                    <label for="step_imgs">Step Img File Names</label>
                    <input type="text" name="step_imgs" value="<?php echo $row['step_imgs'] ?>">
                    
                    <label for="all_ingredients">All Ingredients</label>
                    <input type="text" name="all_ingredients" value="<?php echo $row['all_ingredients'] ?>">
                    
                    <label for="all_steps">All Steps</label>
                    <input type="text" name="all_steps" value="<?php echo $row['all_steps'] ?>">
                    
                    <label for="how_to_name">How To Title</label>
                    <input type="text" name="how_to_name" value="<?php echo $row['how_to_name'] ?>" placeholder="Optional">
                    
                    <label for="how_to_desc">How To Description</label>
                    <input type="text" name="how_to_desc" value="<?php echo $row['how_to_desc'] ?>" placeholder="Optional">

                    <?php
                    if ($row['visibility'] == 'y') {
                        $visibility_for_input = 'checked';
                    } else {
                        $visibility_for_input = '';
                    }
                    ?>
                    <div id="form-footer">
                        <label for="visibility">Visible?</label>
                        <br>
                        <input value="1" name="visibility" class="filter-checkbox" id="visibility" type="checkbox" <?php echo $visibility_for_input ?>/>

                        <input value="<?php echo $row['id'] ?>" type="hidden" name="id">
                        <button type="submit" name="submit">Update Recipe</button>
                        <button type="button" id="form-delete-button">Delete Recipe</button>
                    </div>
                </form>
            </div>
            <?php
                        }
                    }
                    ?>
        </div>
    </main>
    
    <div id="modal-backdrop" style="display: none"></div>
    <div class="modal-close" style="display: none; top: 105%;"><span></span><span></span></div>
    <div id="modal-container" style="display: none">
        <div class="modal-content" id="modal-delete-confirm" style="display: none">
            <form id="delete-form" action="../include/cms-recipe-delete.php" method="POST">
                    <h1>Are you sure?</h1>
                    <input value="<?php echo $row['id'] ?>" type="hidden" name="id">
                    <div id="delete-form-buttons">
                        <button class="button-style" id="form-delete-cancel" type="button">Cancel</button>
                        <button class="button-style" id="form-delete" type="submit" name="submit">Delete</button>
                    </div>
            </form>
        </div>
    <div class="modal-content" id="modal-menu" style="display: none">
        <h1>Menu</h1>
        <a href="../index.php"><button class="button-style">Home</button></a>
        <button class="button-style" id="menu-continue-button">Close</button>
    </div>
</div>

    <?php include_once '../include/footer.php'; ?>
    <script src="../js/cms.js" type="text/javascript"></script>
</body>
</html>