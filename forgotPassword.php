<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forgot Password - To-Do App</title>
    <link rel="stylesheet" href="./classes/assets/forgot.css">
</head>

<body>
    <header>
        <div class="logo">📝 To-Do App</div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="logout.php">Logout</a></li>
                    <li><a href="mytask.php">My Tasks</a></li>
                    <li><a href="profile.php">Profile</a></li>
                <?php else: ?>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="form-box">
            <form action="" name="Formfill">
                <h1>Forgot Your Password?</h1>
                <p>Enter your email and we’ll send you instructions to reset your password.</p>
                <br>
                <div class="input-box">
                    <i class='bx bxs-user'></i>
                    <input type="text" name="email" placeholder="Enter your email">
                </div>

                <div class="button">
                    <input type="submit" class="btn" value="Send Link">
                </div>

            </form>
        </div>
    </div>
    <?php
    include_once "footer.php";
    ?>
</body>

</html>