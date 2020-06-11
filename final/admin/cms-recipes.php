<?php
    $directory_level = '../';
    include_once '../include/db.php';
    
    $query = "SELECT * FROM recipes ORDER BY id DESC;";
    $result = mysqli_query($connection, $query);

    if (!$result ) {
        die ('Database query failed :(');
    }
?>

<!DOCTYPE html>
<html lang="en" id="html">
<head>
    <meta charset="UTF-8">
    <title>BlueBook - Recipe CMS</title>
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
        <h1>CMS for Recipes</h1>
        <div id="cms-wrapper">
            <ul id="cms-all-recipes">
                <h1 class="area-title">All Recipes</h1>
                <br>
                <?php
                if ($result > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <a href="cms-recipe-edit.php?id=<?php echo $row['id'] ?>"><button>
                            <div class="cms-card-img">
                                <img src="../graphics/cards/<?php echo $row['main_img'] ?>" alt="<?php echo $row['main_img'] ?>">
                            </div>
                            <div class="cms-card-content">
                                <?php echo $row['title']
                                ."<br>"
                                .$row['subtitle']; ?>
                            </div>
                        </button></a>
                        <br>
                <?php
                        }
                    }
                ?>
            </ul>
            <div id="cms-form">
                <form action="../include/cms-recipe-handler.php" method="POST">
                <h1 class="area-title">Create a Recipe</h1>
                    <label for="title">Title</label>
                    <input type="text" name="title" placeholder="Title">
                    
                    <label for="subtitle">Subtitle</label>
                    <input type="text" name="subtitle" placeholder="Subtitle">
                    
                    <label for="description">Description</label>
                    <textarea type="text" name="description" placeholder="Description" tall></textarea>
                    
                    <label for="cook_time">Cook Time</label>
                    <br>
                    <input type="text" name="cook_time" placeholder="Cook Time (Mins)" small>
                    <br>
                    
                    <label for="servings">Servings</label>
                    <br>
                    <input type="text" name="servings" placeholder="Servings" small>
                    <br>
                    
                    <label for="cal_per_serving">Calories Per Serving</label>
                    <br>
                    <input type="text" name="cal_per_serving" placeholder="Calories/Serving" small>
                    <br>
                    
                    <label for="protein">Protein</label>
                    <br>
                    <input type="text" name="protein" placeholder="Protein" small>
                    <br>
                    
                    <label for="main_img">Main Img File Name</label>
                    <input type="text" name="main_img" placeholder="Main_img.jpg">
                    
                    <label for="ingredients_img">Ingredients File Name</label>
                    <input type="text" name="ingredients_img" placeholder="Ingredients_img.jpg">
                    
                    <label for="step_imgs">Step Img File Names</label>
                    <input type="text" name="step_imgs" placeholder="Step_imgs.jpg">
                    
                    <label for="all_ingredients">All Ingredients</label>
                    <input type="text" name="all_ingredients" placeholder="All_Ingredients.jpg">
                    
                    <label for="all_steps">All Steps</label>
                    <input type="text" name="all_steps" placeholder="All_steps.jpg">
                    
                    <label for="how_to_name">How To Title</label>
                    <input type="text" name="how_to_name" placeholder="How-To Name">
                    
                    <label for="how_to_desc">How To Description</label>
                    <input type="text" name="how_to_desc" placeholder="How-To Description">
                        <button type="submit" name="submit">+ Add Recipe</button>
                </form>
            </div>
        </div>
    </main>

<div id="modal-backdrop" style="display: none"></div>
<div class="modal-close" style="display: none; top: 105%;"><span></span><span></span></div>
<div id="modal-container" style="display: none">
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