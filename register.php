<?php
session_start();
include_once "./classes/database.php";

if (isset($_POST['submit'])) {
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $phone    = trim($_POST['phone']);
    $password = trim($_POST['password']);

    if (empty($name) || empty($email) || empty($phone) || empty($password)) {
        echo "<script>alert('Please fill all fields');</script>";
    } else {
        $checkQuery = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $checkQuery);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Email already exists');</script>";
        } else {
            $sql = "INSERT INTO users (name, email, phone, password, regdate) VALUES ('$name', '$email', '$phone', '$password', NOW())";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Registration successful!'); window.location.href='login.php';</script>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register - To-Do App</title>
    <link rel="stylesheet" href="./classes/assets/register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="logo">📝 To-Do App</div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="logout.php">Logout</a></li>
                    <li><a href="mytask.php">My Tasks</a></li>
                    <li><a href="profile.php">Profile</a></li>
                <?php else: ?>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <!-- Register Section -->

    <div class="container">
        <div class="form-box">
            <form action="" method="post" name="Formfill">
                <h1>Create an Account</h1>
                <div class="input-box">
                    <i class='bx bxs-user'></i>
                    <input type="text" name="name" placeholder="Enter your name" required>
                </div>
                <div class="input-box">
                    <i class='bx bxs-phone'></i>
                    <input type="text" name="phone" placeholder="Enter your phone" required>
                </div>
                <div class="input-box">
                    <i class='bx bxs-envelope'></i>
                    <input type="text" name="email" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="text" name="password" placeholder="Enter your Password" required>
                </div>
                <div class="button">
                    <input type="submit" class="btn" name="submit" value="Register">
                </div>
                <div class="group">
                    <span><a href="forgotPassword.php">Forget-Password</a></span>
                    <span><a href="login.php">Login</a></span>
                </div>
            </form>
        </div>
    </div>


    <?php include_once "footer.php"; ?>
</body>

</html>