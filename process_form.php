<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "file";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Prepare and bind the SQL statement
    $sql = "INSERT INTO data (name, email) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bind_param("ss", $name, $email);
        $name = $_POST["name"];
        $email = $_POST["email"];

        if ($stmt->execute()) {
            echo "Record added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
