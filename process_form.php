<?php
// Database connection
$servername = "localhost";
$username = "wizard";
$password = "wizard";
$dbname = "learning zone";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Process form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $form_name = $_POST["form_name"];
    $data = $_POST["data"];

    // Process data based on form name
    switch ($form_name) {
        case "form1":
            // Example: Insert data into a table
            $stmt = $conn->prepare("INSERT INTO form1_data (data) VALUES (:data)");
            $stmt->bindParam(':data', $data);
            $stmt->execute();
            break;
        case "form2":
            // Example: Update data in a table
            $stmt = $conn->prepare("UPDATE form2_data SET data = :data WHERE id = 1");
            $stmt->bindParam(':data', $data);
            $stmt->execute();
            break;
        // Add more cases for each form
    }
}

// Close database connection
$conn = null;
?>