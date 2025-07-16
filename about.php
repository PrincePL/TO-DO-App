<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - To-Do List App</title>
    <link rel="stylesheet" href="./classes/assets/about.css">
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

    <main class="about-section">
        <h1>About Our To-Do List App</h1>
        <p>
            Our To-Do List App is designed to help you stay organized, focused, and productive.
            Whether you're a student, professional, or just someone who loves planning your day,
            our app provides a simple and powerful way to manage your daily tasks.
        </p>

        <h2>🚀 Features</h2>
        <ul>
            <li>Create, update, and delete tasks easily</li>
            <li>Mark tasks as complete</li>
            <li>Simple and clean user interface</li>
            <li>Mobile-friendly and fast</li>
            <li>User registration and login system</li>
        </ul>

        <h2>🎯 Our Goal</h2>
        <p>
            Our mission is to make task management effortless for everyone. We believe
            productivity tools should be simple, efficient, and accessible to all.
        </p>

        <h2>👨‍💻 Developed By</h2>
        <p>
            This project was developed by <strong>Prince Pal</strong> as a part of a web development learning journey.
            Feel free to explore, contribute, or give feedback to help improve this app.
        </p>
    </main>
    <?php
    include_once "footer.php";
    ?>
</body>

</html>