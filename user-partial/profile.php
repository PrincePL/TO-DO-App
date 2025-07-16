<?php
@session_start();

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile - To-Do App</title>
    <link rel="stylesheet" href="../classes/assets/dashboard.css">
</head>

<body>
    <header>
        <div class="logo">📝 My Profile</div>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="mytask.php">My Tasks</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="../register.php">Register</a></li>
                    <li><a href="../login.php">Login</a></li>
                <?php endif; ?>
                <li><a href="../about.php">About Us</a></li>
                <li><a href="../contact.php">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <main class="dashboard-container">
        <section class="welcome-card">
            <h1>👤 Profile Overview</h1>
            <p>Manage your account and settings here.</p>
        </section>

        <section class="stats">
            <div class="stat-box total">
                <h2>Username</h2>
                <p><?php echo $_SESSION['username'] ?? 'N/A'; ?></p>
            </div>
            <div class="stat-box completed">
                <h2>Email</h2>
                <p><?php echo $_SESSION['email'] ?? 'example@example.com'; ?></p>
            </div>
            <div class="stat-box pending">
                <h2>Joined</h2>
                <p><?php echo $_SESSION['regdate'] ?? 'January 2024'; ?></p> <!-- Replace with dynamic joined date if available -->
            </div>
        </section>

        <section class="actions">
            <!-- <a href="#" class="btn dash-btn">Edit Profile</a>
            <a href="#" class="btn dash-btn danger">Delete Account</a> -->
        </section>
    </main>

    <?php include_once "../footer.php"; ?>
</body>

</html>