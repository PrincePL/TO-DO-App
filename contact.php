<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact Us - To-Do App</title>
    <link rel="stylesheet" href="./classes/assets/contact.css">
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

    <main class="contact-section">
        <h1>Contact Us</h1>
        <p>If you have any questions or feedback, feel free to reach out!</p>

        <form class="contact-form" action="#" method="post">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </main>
    <?php
    include_once "footer.php";
    ?>
</body>

</html>