<?php
// Replace with your actual database connection details
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

// Modify the SQL query based on the search input
$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT * FROM registration WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        .employee-list-container {
            max-width: 100%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        h2 {
            color: #333;
            font-size: 40px;
        }

        .back-button {
            position: absolute;
            top: 100px;
            left: 100px;
            cursor: pointer;
            padding: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .back-button:hover {
            background-color: #45a049;
        }

        /* Add a style for the search form */
        .search-form {
            margin-top: 20px;
            text-align: center;
        }

        .search-input {
            padding: 10px;
            width: 60%;
            box-sizing: border-box;
        }

        .search-button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <button class="back-button" onclick="goBack()">Back</button>

    <div class="employee-list-container">
        <h2>Members List</h2>

        <!-- Add a search form -->
        <form class="search-form" method="GET" action="">
            <label for="search">Search:</label>
            <input class="search-input" type="text" id="search" name="search" placeholder="Enter name">
            <input class="search-button" type="submit" value="Search">
        </form>

        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>File Number</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Email</th>
                <th>Permit Type</th>
            </tr>

            <?php
            // Loop through the results based on the search query
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['ID']}</td>";
                    echo "<td>{$row['firstname']}</td>";
                    echo "<td>{$row['lastname']}</td>";
                    echo "<td>{$row['filenumber']}</td>";
                    echo "<td>{$row['phonenumber']}</td>";
                    echo "<td>{$row['gender']}</td>";
                    echo "<td>{$row['address']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['ftype']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No employees found</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
