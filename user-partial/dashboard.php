<?php
@session_start();
include_once "../classes/database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

// Get user ID
$user_id = $_SESSION['user_id'];
// var_dump($user_id);
// exit;

// Fetch task statistics
$total_tasks = 0;
$completed_tasks = 0;
$pending_tasks = 0;

$sql_total = "SELECT COUNT(*) AS total FROM tasks WHERE user_id = $user_id";
$sql_completed = "SELECT COUNT(*) AS completed FROM tasks WHERE user_id = $user_id AND status = 'completed'";
$sql_pending = "SELECT COUNT(*) AS pending FROM tasks WHERE user_id = $user_id AND status = 'pending'";

$result_total = $conn->query($sql_total);
$result_completed = $conn->query($sql_completed);
$result_pending = $conn->query($sql_pending);

if ($result_total) {
    $row = $result_total->fetch_assoc();
    $total_tasks = $row['total'];
}
if ($result_completed) {
    $row = $result_completed->fetch_assoc();
    $completed_tasks = $row['completed'];
}
if ($result_pending) {
    $row = $result_pending->fetch_assoc();
    $pending_tasks = $row['pending'];
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - To-Do App</title>
    <link rel="stylesheet" href="../classes/assets/dashboard.css">
</head>

<body>
    <header>
        <div class="logo">📝 To-Do Dashboard</div>
        <nav>
            <ul>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="../index.php">Home</a></li>
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
            <h1 style="border-bottom: 3px solid aqua ">Welcome Back! <?= $_SESSION['username']; ?> ! 👋</h1>
            <p>Here's a quick overview of your productivity.</p>
        </section>

        <section class="stats">
            <div class="stat-box total">
                <h2><?= $total_tasks; ?></h2>
                <p>Total Tasks</p>
            </div>
            <div class="stat-box completed">
                <h2><?= $completed_tasks; ?></h2>
                <p>Completed Tasks</p>
            </div>
            <div class="stat-box pending">
                <h2><?= $pending_tasks; ?></h2>
                <p>Pending Tasks</p>
            </div>
        </section>

        <section class="actions">
            <a href="mytask.php" class="btn dash-btn">Manage Tasks</a>
            <a href="add-task.php" class="btn dash-btn">Add New Task</a>
        </section>
    </main>

    <?php include_once "../footer.php"; ?>
</body>

</html>