<?php

    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit();
    }

    if (isset($_POST['addnote-btn'])) {
        if (!empty($_POST['note-input'])) {
            $note = $_POST['note-input'];
            $note = htmlspecialchars($note, ENT_QUOTES, 'UTF-8');
            $user_id = $_SESSION['user_id'];

            // Insert the data into the database
            $insert_query = "INSERT INTO notes (user_id, content) VALUES (?, ?)";
            $insert_stmt = $conn->prepare($insert_query);
            $insert_stmt->bind_param("ss", $user_id, $note);
            $insert_stmt->execute();

            header('Location: dashboard.php');
            exit();
        }
    }
?>