<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List App</title>
    <link rel="stylesheet" href="./classes/assets/index.css">
</head>

<body>
    <header>
        <div class="logo">📝 To-Do App</div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="./user-partial/dashboard.php">Dashboard</a></li>
                    <li><a href="./user-partial/mytask.php">My Tasks</a></li>
                    <li><a href="./user-partial/profile.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>

            </ul>
        </nav>
    </header>

    <main>
        <section class="welcome">
            <h1>Welcome to Your To-Do List Manager</h1>
            <p>Track your daily tasks, organize your goals, and stay productive!</p>
        </section>
    </main>

    <?php include_once "footer.php"; ?>
</body>

</html>