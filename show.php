<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration_form";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data from the database
$sql = "SELECT * FROM registration";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='user-list-container'>";
    echo "<h2>Existing Users</h2>";
    echo "<ul>";

    while ($row = $result->fetch_assoc()) {
        echo "<li>{$row['firstname']} {$row['lastname']} {$row['filenumber']} - Email: {$row['email']} - Phone: {$row['phonenumber']}</li>";
    }

    echo "</ul>";
    echo "</div>";
} else {
    echo "No users found.";
}

// Close the database connection
$conn->close();
?>
