<?php
    $directory_level = '../';
    include_once '../include/db.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id={$id};";
    $result = mysqli_query($connection, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        if ($row = mysqli_fetch_assoc($result)) {
?>

<!DOCTYPE html>
<html lang="en" id="html">
<head>
    <meta charset="UTF-8">
    <title>BlueBook - Edit User</title>
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
        <h1>CMS - Edit User: <?php echo $row['name'] ?></h1>
            <div id="cms-wrapper">
                    <div id="cms-form">
                        <form action="../include/cms-user-editor.php" method="POST">
                            <label  for="name">Name:</label>
                            <input value="<?php echo $row['name'] ?>" type="text" name="name">
                            <label  for="username">Username:</label>
                            <input value="<?php echo $row['username'] ?>" type="text" name="username">
                            <label  for="password">Password:</label>
                            <input value="<?php echo $row['password'] ?>" type="text" name="password">
                            <label  for="role">Role of operator:</label>
                            <input value="<?php echo $row['role'] ?>" type="text" name="role">
                                <input value="<?php echo $row['id'] ?>" type="hidden" name="id">
                                <button id="form-submit" type="submit" name="submit">Update User</button>
                            </form>
                        <form action="../include/cms-user-delete.php" method="POST">
                            <input value="<?php echo $row['id'] ?>" type="hidden" name="id">
                            <button id="form-delete" type="submit" name="submit">Delete User</button>
                        </form>
                    <!-- <button id="form-clear" name="reset">Clear</button> -->
                    </div>
        <?php
                    }}
        ?>
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

    <?php include_once '../include/footer.php'; ?>
    <script src="../js/cms.js" type="text/javascript"></script>

</body>
</html>