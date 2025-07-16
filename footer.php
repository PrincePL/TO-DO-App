<style>
    footer {
        background-color: rgba(0, 0, 0, 0.9);
        color: white;
        padding: 40px 20px 20px;
        margin-top: 50px;
        font-size: 16px;
    }

    .footer-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        max-width: 1100px;
        margin: auto;
    }

    .footer-container div {
        flex: 1;
        margin: 10px;
        min-width: 200px;
    }

    .footer-container h3,
    .footer-container h4 {
        margin-bottom: 10px;
        color: #00ffc8;
    }

    .footer-container ul {
        list-style: none;
        padding: 0;
    }

    .footer-container ul li {
        margin: 8px 0;
    }

    .footer-container ul li a,
    .footer-right a {
        color: #ccc;
        text-decoration: none;
        transition: color 0.3s;
    }

    .footer-container ul li a:hover,
    .footer-right a:hover {
        color: #00ffc8;
    }

    .footer-bottom {
        text-align: center;
        margin-top: 20px;
        border-top: 1px solid #333;
        padding-top: 10px;
        font-size: 14px;
    }
</style>

<footer>
    <div class="footer-container">
        <div class="footer-left">
            <h3>📝 To-Do App</h3>
            <p>Stay productive. Stay organized.</p>
        </div>

        <div class="footer-center">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </div>

        <div class="footer-right">
            <h4>Connect</h4>
            <p>Email: <a href="mailto:prince@example.com">prince@example.com</a></p>
            <p>GitHub: <a href="https://github.com/" target="_blank">YourGitHub</a></p>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2025 Prince Pal. All rights reserved.</p>
    </div>
</footer>