<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['matric'])) {
    $conn = new mysqli("localhost", "root", "", "Lab_5b");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $matric = $_GET['matric'];

    $stmt = $conn->prepare("DELETE FROM users WHERE matric = ?");
    $stmt->bind_param("s", $matric);

    if ($stmt->execute()) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: display.php");
    exit;
} else {
    echo "Invalid request.";
    exit;
}
?>
