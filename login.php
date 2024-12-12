<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="">
        <label>Matric:</label><br>
        <input type="text" name="matric" required><br>
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>
        <input type="submit" value="Login">
    </form>

    <p>Don't have an account? <a href="register.php">Register here</a></p>

    <?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $matric = $_POST['matric'];
        $name = $_POST['name'];

        $conn = new mysqli("localhost", "root", "", "Lab_5b");
        if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

        $result = $conn->query("SELECT * FROM users WHERE matric='$matric' AND name='$name'");
        if ($result->num_rows > 0) {
            $_SESSION['loggedin'] = true;
            header("Location: display.php");
        } else {
            echo "<p style='color: red;'>Invalid username or password, try to <a href=''><u>login</u></a> again.</p>";
        }
        $conn->close();
    }
    ?>
</body>
</html>
