<?php
@session_start();
include_once "../classes/database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_SESSION['user_id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $due_date = $_POST['due_date'];

    if (!empty($title)) {
        $sql = "INSERT INTO tasks (user_id, title, description, due_date) 
                VALUES ('$user_id', '$title', '$description', '$due_date')";
        if ($conn->query($sql)) {
            $success = "Task added successfully!";
        } else {
            $error = "Failed to add task. Please try again.";
        }
    } else {
        $error = "Task title is required.";
    }
}
?>

<html>

<head>
    <title>Add New Task</title>
    <link rel="stylesheet" href="../classes/assets/add-task.css">
</head>

<body>
    <header>
        <div class="logo">📝 Add New Task</div>
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
        <section class="add-task-container">
            <h1>Add New Task</h1>
            <?php if ($success): ?>
                <p class="success"><?= $success ?></p>
            <?php elseif ($error): ?>
                <p class="error"><?= $error ?></p>
            <?php endif; ?>

            <form action="" method="POST">
                <input type="text" name="title" placeholder="Task Title" required>
                <textarea name="description" placeholder="Task Description"></textarea>
                <input type="date" name="due_date">
                <button type="submit">Add Task</button>
            </form>
        </section>
    </main>


    <?php include_once "../footer.php"; ?>
</body>

</html>