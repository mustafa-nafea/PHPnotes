<?php

    session_start();
    require('config/config.php');
    require('config/db.php');

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit();
    }

    if (isset($_GET['id'])) {
        $note_id = mysqli_real_escape_string($conn, $_GET['id']);
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT * FROM notes WHERE id = $note_id AND user_id = " . mysqli_real_escape_string($conn, $user_id);
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $note = mysqli_fetch_assoc($result);
        }
    }

    if (isset($_POST['delete-btn'])) {
        $deleteSql = "DELETE FROM notes WHERE id = $note_id";

        if (mysqli_query($conn, $deleteSql)) {
            header('Location: dashboard.php');
            exit();
        }
    }
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
            <h1>Delete Note</h1>
            <p>Are you sure you want to delete the following note?</p>
            <form action="deletenote.php?id=<?php echo $note_id; ?>" method="post" name="notes-form">
                <ul id="notes-list">
                    <input type="text" id = "notes-input" name="newnote-input" value="<?php echo $note['content']; ?>"/>
                    <button type="submit" name="delete-btn">Yes Delete</button>
                </ul>
            </form>
        </div>
    </div>  
</body>
</html>
