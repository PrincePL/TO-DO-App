<?php
@session_start();
include_once "../classes/database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (!isset($_GET['id'])) {
    header("Location: mytask.php");
    exit();
}

$task_id = intval($_GET['id']);

// Fetch task details
$sql = "SELECT * FROM tasks WHERE id = $task_id AND user_id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows != 1) {
    echo "Task not found or access denied!";
    exit();
}

$task = $result->fetch_assoc();

// Update task on form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $status = $_POST['status'];
    $due_date = $_POST['due_date'];

    $update_sql = "UPDATE tasks SET 
        title = '$title', 
        description = '$description', 
        status = '$status', 
        due_date = '$due_date' 
        WHERE id = $task_id AND user_id = $user_id";

    if ($conn->query($update_sql) === TRUE) {
        header("Location: mytask.php?updated=1");
        exit();
    } else {
        echo "Error updating task: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
    <link rel="stylesheet" href="../classes/assets/add-task.css">
</head>

<body>
    <header>
        <div class="logo">📝 To-Do App</div>
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

    <div class="dashboard-container">
        <div class="add-task-container">
            <h1>Edit Task</h1>
            <form method="POST">
                <div class="input-box">
                    <input type="text" name="title" placeholder="Title" required value="<?= htmlspecialchars($task['title']) ?>">
                </div>
                <div class="input-box">
                    <input type="text" name="description" placeholder="Description" required value="<?= htmlspecialchars($task['description']) ?>">
                </div>
                <div class="input-box">
                    <input type="date" name="due_date" required value="<?= $task['due_date'] ?>">
                </div>
                <div class="input-box">
                    <select name="status" required>
                        <option value="pending" <?= $task['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                        <option value="completed" <?= $task['status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
                    </select>
                </div>
                <div class="button">
                    <button type="submit" class="btn">Update Task</button>
                </div>
            </form>
        </div>
    </div>
    <?php include_once "../footer.php"; ?>
</body>

</html>