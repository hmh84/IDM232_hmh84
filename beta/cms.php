<?php
    // Step 1 Open a connection to DB
    require 'include/db.php';

    // Step 2 Perform a DB table query
    $table = 'recipes';
    $query ="SELECT * FROM {$table}";
    $result = mysqli_query($connection, $query);

    // Check for errors in SQL statement
    if (!$result ) {
        die ('Database query failed');
    }
?>

<!DOCTYPE html>
<html lang="en" id="html">
<head>
    <meta charset="UTF-8">
    <title>IDM 232 - Beta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
</head>

<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $id; ?>">
        <div class="form-group">
            <label for="courseTitle">Course Name</label>
            <input type="text" class="form-control" name="courseTitle" id="courseTitle" placeholder="My course Title" value="<?php echo $course['courseTitle']; ?>">
        </div>
</body>

<aside>
<aside class="col-md-3">
    <h2>Courses</h2>
    <div class="list-group">
    <?php
    $query = 'SELECT id, courseTitle ';
    $query .= 'FROM courses ';
    $query .= 'ORDER BY id ASC';
    
    $result = mysqli_query($connection, $query);
    
    if (!$result) {
        die('Database query failed.');
    }

    while ($course = mysqli_fetch_assoc($result)) {
        echo '<a href="manage_courses.php?id=';
        echo urlencode($course['id']);
        echo '" class="list-group-item';
        if (isset($safe_id)) {
            if ($course['id'] == $safe_id) {
            echo ' active';
            }
        }
        echo '">';
        echo $course['courseTitle'];
        echo '</a>';
      } // end while
        mysqli_free_result($result);
?>

<a href="add_course.php"
    class="list-group-item">
    <span class="glyphicon glyphicon-plus"
    aria-hidden="true"></span> Add Course</a>
    ?>
</aside>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"
integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
crossorigin="anonymous"></script>
</html>