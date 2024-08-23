<?php
// Database configuration
$servername = "20.2.89.233";
$username = "testuser";
$password = "password";
$dbname = "testdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

// Create a table if it does not exist
$createTableSql = "CREATE TABLE IF NOT EXISTS sample_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
)";
if ($conn->query($createTableSql) === TRUE) {
    echo "Table created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Insert data into the table
$insertSql = "INSERT INTO sample_table (name) VALUES ('Sample Name')";
if ($conn->query($insertSql) === TRUE) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $insertSql . "<br>" . $conn->error . "<br>";
}

// Query the table and display results
$selectSql = "SELECT id, name FROM sample_table";
$result = $conn->query($selectSql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
    }
} else {
    echo "0 results<br>";
}

// Close the connection
$conn->close();
?>

