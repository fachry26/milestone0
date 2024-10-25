<?php
// Database connection
$mysqli = new mysqli("localhost", "root", "fachry", "app_fachry");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize inputs
    $username = trim($_POST['registerName']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);

    // Check if any field is empty
    if (empty($username) || empty($email) || empty($password)) {
        die("Username, Email, or Password cannot be empty.");
    }

    // Check if username or email already exists
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ? OR email = ?"); //select from SQLdb
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        die("Username or Email already exists.");
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the database
    $stmt = $mysqli->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashedPassword, $email);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $mysqli->close();
}
?>
