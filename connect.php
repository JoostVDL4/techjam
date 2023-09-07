<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get data from the form
    $name = $_POST["name"];
    // Add other data variables here

    // Connect to the SQLite database
    $db = new SQLite3("file.db");

    // Check if the database connection was successful
    if (!$db) {
        die("Database connection failed: " . $db->lastErrorMsg());
    }

    // Insert data into a table
    $query = "INSERT INTO data (name, column2, column3) VALUES (:name, :column2, :column3)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':name', $name);
    // Bind other parameters here
    $stmt->execute();

    // Close the database connection
    $db->close();

    // Send a response (e.g., JSON) to the client
    echo json_encode(["message" => "Data successfully inserted"]);
}
?>