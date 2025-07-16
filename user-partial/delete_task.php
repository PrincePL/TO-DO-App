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

    // Secure delete query: deletes only task belonging to current user
    $sql = "DELETE FROM tasks WHERE id = $task_id AND user_id = $user_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: mytask.php?deleted=1");
        exit();
    } else {
        echo "Error deleting task: " . $conn->error;
    }
} else {
    header("Location: mytask.php");
    exit();
}
