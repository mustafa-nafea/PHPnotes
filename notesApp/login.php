<?php require_once 'authentication.php'?>

<!DOCTYPE html>
<html>
    <head>
        <title>CAT NOTES</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="page">
            <div id="login-page">
                <h1>Log In</h1>
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <form method="post" action="login.php" name="login-form">
                    <label for="username_email">Username Or Email</label>
                    <input type="text" name="username_email" id="username_email" placeholder="Username or Email">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password">
                    <button type="submit" name="login-btn">Log In</button>
                </form>
                <p>If You don't have an account click <a href="signup.php">here</a> to signup.</p>
            </div>
        </div>
    </body>
</html>
