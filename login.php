<?php
@session_start();
include_once "./classes/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validation
    if (empty($email) || empty($password)) {
        echo "<script>alert('Please fill all fields');</script>";
    } else {
        // Escape inputs to prevent SQL injection
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        // Check user in database
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // var_dump($row);
            // exit;

            // Store user data in session
            $_SESSION['user_id'] = $row["id"];
            $_SESSION['username'] = $row["name"];
            $_SESSION['email'] = $row["email"];
            $_SESSION['regdate'] = $row["regdate"];

            header("location: ./user-partial/dashboard.php");
        } else {
            echo "<script>alert('Invalid email or password');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./classes/assets/login.css">

</head>

<body>
    <header>
        <div class="logo">📝 To-Do App</div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="logout.php">Logout</a></li>
                    <li><a href="mytask.php">My Tasks</a></li>
                <?php else: ?>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>

            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="form-box">
            <form action="" method="post" name="Formfill">
                <h1>Login</h1>
                <div class="input-box">
                    <i class='bx bxs-user'></i>
                    <input type="text" name="email" placeholder="Email">
                </div>
                <div class="input-box">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="text" name="password" placeholder="Password">
                </div>
                <div class="button">
                    <input type="submit" class="btn" name="login" value="Login">
                </div>
                <div class="group">
                    <span><a href="forgotPassword.php">Forget-Password</a></span>
                    <span><a href="register.php">Register</a></span>
                </div>
            </form>
        </div>
    </div>
    <?php
    include_once "footer.php";
    ?>
</body>

</html>