<?php
    session_start();
    require('config/config.php');
    require('config/db.php');
    require_once 'addnote.php';
    
    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit();
    }

    // Log out by destroying the session
    if (isset($_POST['logout-btn'])) {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        session_destroy();
        header('Location: login.php');
        exit();
        }

    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM notes WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql);
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <div class ="page">
        <div id = "notes-page" >

            <h1><?php echo $_SESSION['username']; ?>'s Notes</h1>

            <form method="post" action="dashboard.php" name="notes-form">
                <input type="text" id = "notes-input" name="note-input" placeholder="Type your note here... "/>
                <button type="submit" name="addnote-btn">Add Note</button>
                <ul id="notes-list">
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <li>
                            <?php echo nl2br(htmlspecialchars($row['content'])); ?><br>
                            <button type="button" onclick="window.location.href='editnote.php?id=<?php echo $row['id']; ?>'">Edit</button>
                            <button type="button" onclick="window.location.href='deletenote.php?id=<?php echo $row['id']; ?>'">Delete</button>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <button type="submit" name="logout-btn">Logout</button>
            </form>

        </div>
    </div>
    

</body>
</html>
