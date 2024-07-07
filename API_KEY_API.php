<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "mycolleg_iot";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Specify the table name and column you want to display
$tableName = "API_KEY";
$columnName = "Token";
$columns = array("ID", "Token", "Folder", "Valid_upto");
// SQL query to select the specified column from the table
// SQL query to select specific columns where Folder is 'SmartIrrigation'
$sql = "SELECT " . implode(", ", $columns) . " FROM $tableName WHERE Folder = 'SmartPredictive'";

$result = $conn->query($sql);

$response = array();

if ($result->num_rows > 0) {
    // Fetch data and add it to the response array
    while ($row = $result->fetch_assoc()) {
        $record = array();
        foreach ($columns as $column) {
            $record[$column] = $row[$column];
        }
        $response[] = $record;
    }

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // No records found
    $response['message'] = "No records found";
    echo json_encode($response);
}

// Close the database connection
$conn->close();
?>