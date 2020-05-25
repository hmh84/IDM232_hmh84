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
    <title>IDM 232 - Beta</title>
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
                <p id="header-help-link">Help</p>
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
                <?php
                if ($result > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <button>
                            <div class="cms-card-img">
                                <img src="../graphics/users/<?php echo $row['profile_pic'] ?>" alt="<?php echo $row['profile_pic'] ?>">
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
                    <label for="name">Name:</label>
                    <input type="text" name="name" placeholder="First Name">
                    <label for="username">Username:</label>
                    <input type="text" name="username" placeholder="Username">
                    <label for="password">Password:</label>
                    <input type="text" name="password" placeholder="Password">
                    <label for="role">Role of operator:</label>
                    <input type="text" name="role" placeholder="Admin/User">
                        <button type="submit" name="submit">+ Add User</button>
                </form>
            </div>
        </div>
    </main>

    <footer>
        <p>BlueBook 2020</p>
        <a target="_blank" href="https://www.hunterhdesign.com">
            <p>Created by: Hunter H Design</p>
        </a>
    </footer>
    <script src="../js/main.js" type="text/javascript"></script>
</body>
</html>