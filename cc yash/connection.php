<?php
// Database connection parameters
$servername = "database-1.cnwnhpuqjzem.ap-south-1.rds.amazonaws.com 3306"; // Replace with your MySQL server name
$username = "admin";       // Replace with your MySQL username
$password = "12345678";       // Replace with your MySQL password
$dbname = "train";   // Replace with your MySQL database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the code reaches this point, the database connection is established.

// Handle user registration data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $birthdate = $_POST["birthdate"];
    $gender = $_POST["gender"];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $sql = "INSERT INTO users (firstname, lastname, email, password, birthdate, gender) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $firstname, $lastname, $email, $hashed_password, $birthdate, $gender);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection when you're done
$conn->close();
?>
