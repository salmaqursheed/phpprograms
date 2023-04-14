<?php
// Database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Escape user inputs for security
$homework = mysqli_real_escape_string($conn, $_POST['homework']);
$assignment = mysqli_real_escape_string($conn, $_POST['assignment']);

// Insert data into the database
$sql = "INSERT INTO homework_assignments (homework, assignment) VALUES ('$homework', '$assignment')";

if (mysqli_query($conn, $sql)) {
    echo "Homework and assignment inserted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>