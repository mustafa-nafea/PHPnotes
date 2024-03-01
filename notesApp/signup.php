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
        <div id="signup-page">
            <h1>Register</h1>
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <form method="post" action="signup.php" name="signup-form">
                <label for="username">Username</label>
                <input type="text" name="new-username" value="<?php echo $username ?>" placeholder="Username">
                <label for="email">Email</label>
                <input type="email" name="email" value="<?php echo $email ?>" placeholder="Email">
                <label for="password">Password</label>
                <input type="password" name="new-password" placeholder="New Password">
                <label for="confirmPassword">Confirm Password</label >
                <input type="password" name="confirm-password" placeholder="Confirm Password">
                <button type="submit" name="signup-btn">Sign Up</button>
            </form>
            <p>Already have an Account? <a href="login.php">Login</a></p>
        </div>
    </div>
</body>
</html>
