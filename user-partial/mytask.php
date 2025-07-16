<?php
@session_start();
include_once "../classes/database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user tasks
$sql = "SELECT * FROM tasks WHERE user_id = $user_id ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Tasks - To-Do App</title>
    <link rel="stylesheet" href="../classes/assets/mytask.css">
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

    <main class="task-container">
        <h1>📋 Your Tasks</h1>

        <?php if (isset($_GET['updated']) && $_GET['updated'] == 1): ?>
            <p style="color: #00ffc8; font-weight: bold; text-align:center; margin-bottom: 20px;">
                ✅ Task updated successfully!
            </p>
        <?php endif; ?>

        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($task = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($task['title']) ?></td>
                            <td><?= htmlspecialchars($task['description']) ?></td>
                            <td><?= ucfirst($task['status']) ?></td>
                            <td><?= $task['due_date'] ?></td>
                            <td>
                                <a href="edit_task.php?id=<?= $task['id'] ?>">✏️ Edit</a> |
                                <a href="delete_task.php?id=<?= $task['id'] ?>" onclick="return confirm('Are you sure?')">🗑️ Delete</a> |
                                <?php if ($task['status'] == 'pending'): ?>
                                    <a href="complete_task.php?id=<?= $task['id'] ?>">✅ Mark Complete</a>
                                <?php else: ?>
                                    <span style="color: lime;">✔️ Done</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No tasks found. <a href="add-task.php">Add one now</a>.</p>
        <?php endif; ?>
    </main>


    <?php include_once "../footer.php"; ?>
</body>

</html>