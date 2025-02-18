<?php
include 'db_connection.php';

if (isset($_POST['signup'])) {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate form data (not shown here, but should be done to ensure data integrity)

    // Insert user data into the database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    $conn->exec($sql);

    echo "User registered successfully";
}

if (isset($_POST['login'])) {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate form data (not shown here, but should be done to ensure data integrity)

    // Check if the email and password match a user in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->execute([$email, $password]);
    $user = $stmt->fetch();

    if ($user) {
        echo "Login successful";
    } else {
        echo "Invalid email or password";
    }
}

?>