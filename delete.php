<?php
if (isset($_GET['matric'])) {
    $conn = new mysqli("localhost", "root", "", "Lab_5b");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $matric = $_GET['matric'];

    // Prepare and execute the delete query
    $stmt = $conn->prepare("DELETE FROM users WHERE matric = ?");
    $stmt->bind_param("s", $matric);

    if ($stmt->execute()) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Redirect back to display.php
    header("Location: display.php");
    exit;
} else {
    echo "Invalid request.";
    exit;
}
?>
