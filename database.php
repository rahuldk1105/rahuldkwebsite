<?php
// Database connection details
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$database = "your_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Retrieve form data
$first_name = $_POST['first-name'];
$last_name = $_POST['last-name'];
$email = $_POST['email'];
$age = $_POST['age'];
$student = $_POST['Are You a student'];
$rating = $_POST['rating'];
$suggestions = $_POST['suggestions'];

// SQL query to insert the data into a table
$sql = "INSERT INTO survey_data (first_name, last_name, email, age, student, rating, suggestions) 
        VALUES ('$first_name', '$last_name', '$email', '$age', '$student', '$rating', '$suggestions')";

if ($conn->query($sql) === TRUE) {
    echo "Form data submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
