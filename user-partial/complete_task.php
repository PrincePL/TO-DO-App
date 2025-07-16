<?php
@session_start();
include_once "../classes/database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if (isset($_GET['id'])) {
    $task_id = intval($_GET['id']);
    $user_id = $_SESSION['user_id'];

    // Update task status to 'completed' for current user only
    $sql = "UPDATE tasks SET status = 'completed' WHERE id = $task_id AND user_id = $user_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: mytask.php?completed=1");
        exit();
    } else {
        echo "Error updating task: " . $conn->error;
    }
} else {
    header("Location: mytask.php");
    exit();
}
