<?php
    include_once '../include/db.php';
    
    $query ="SELECT * FROM users ORDER BY role;";
    $result = mysqli_query($connection, $query);

    if (!$result ) {
        die ('Database query failed :(');
    }
?>

<!DOCTYPE html>
<html lang="en" id="html">
<head>
    <meta charset="UTF-8">
    <title>BlueBook - User CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/cms.css">
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
</head>
<body>

<!-- Header -->

    <header>
        <div id="hero">
            <div id="hero-filter"></div>
            <div id="slideshow">
                <img src="../graphics/slideshow/hero-1.jpg" alt="Hero Photo">
                <img src="../graphics/slideshow/hero-2.jpg" alt="Hero Photo">
                <img src="../graphics/slideshow/hero-3.jpg" alt="Hero Photo">
            </div>
            <div id="hero-content">
                <h1 class="logo-text">BlueBook</h1>
                <!-- <p id="header-help-link">Help</p> -->
                <p id="header-menu-link">Menu</p>
                <h2 class="logo-text">Let's get cooking.</h2>
                <h1>BlueBook is a company dedicated to bringing you high quality meals made in simple ways.</h1>
            </div>
        </div>
    </header>

<!-- Main - Search & Filter -->

    <main>
        <h1>CMS - All Blue Book CMS Users</h1>
        <div id="cms-wrapper">
            <ul id="cms-all-recipies">
            <h1 class="area-title">All Users</h1>
                <?php
                if ($result > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <button>
                            <div class="cms-card-img">
                                <img src="../graphics/users/user.png" alt="Profile Pic">
                            </div>
                            <div class="cms-card-content">
                                <?php echo
                                "Name: ".$row['name']
                                ."<br>"
                                ."Username: ".$row['username']
                                ."<br>"
                                ."Role: ".$row['role']; ?>
                            </div>
                        </button>
                        <br>
                <?php
                        }
                    }
                ?>
            </ul>
            <div id="cms-form">
                <form action="../include/cms-user-handler.php" method="POST">
                <h1 class="area-title">Create a User</h1>
                    <label for="name">Name:</label>
                    <input type="text" name="name" placeholder="First Name">
                    <label for="username">Username:</label>
                    <input type="text" name="username" placeholder="Username">
                    <label for="password">Password:</label>
                    <input type="text" name="password" placeholder="Password">
                    <label for="role">Role of operator:</label>
                    <input type="text" name="role" placeholder="Admin/User">
                        <button id="form-submit" type="submit" name="submit">+ Add User</button>
                    </form>
                    <!-- <button id="form-clear" name="reset">Clear</button> -->
            </div>
        </div>
    </main>

<div id="modal-backdrop" style="display: none"></div>
<div class="modal-close" style="display: none; top: 105%;"><span></span><span></span></div>
<div id="modal-container" style="display: none">
    <div class="modal-content" id="modal-menu" style="display: none">
        <h1>Menu</h1>
        <a href="../index.php"><button class="button-style">Home</button></a>
        <a href="cms-recipes.php"><button class="button-style" id="menu-user-cms-button">Recipe CMS</button></a>
        <button class="button-style" id="menu-continue-button">Close</button>
    </div>
</div>

    <footer>
        <p>BlueBook 2020</p>
        <a target="_blank" href="https://www.hunterhdesign.com">
            <p>Created by: Hunter H Design</p>
        </a>
    </footer>
    <script src="../js/cms.js" type="text/javascript"></script>
</body>
</html>