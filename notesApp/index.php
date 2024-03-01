<?php
    require('config/config.php');
    require('config/db.php');
    session_start();

    // Check if the user is logged in
    if (isset($_SESSION['user_id'])) {
        header('Location: dashboard.php');
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App</title>
    <link rel="stylesheet" href="indexStyle.css">
</head>
<body>
    <header>
        <h1>Notes App</h1>
    </header>

    <div class="container">
        <h2>Welcome to the CAT Notes App</h2>
        <p>This is a simple note-taking application. Please <a href="login.php">login</a> or <a href="signup.php">register</a> to get started.</p>
    </div>

</body>
</html>
