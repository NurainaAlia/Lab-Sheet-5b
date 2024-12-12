<!DOCTYPE html>
<html lang="en">
<head>
    <title>Users</title>
</head>
<body>
    <h2>Users List</h2>
    <table border="1">
        <tr>
            <th>Matric</th>
            <th>Name</th>
            <th>Level</th>
        </tr>

        <?php
        $conn = new mysqli("localhost", "root", "", "Lab_5b");
        if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

        $result = $conn->query("SELECT matric, name, role FROM users");
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['matric']}</td><td>{$row['name']}</td><td>{$row['role']}</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
