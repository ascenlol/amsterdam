<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$dbname = "kradziezrower";

try {
    // Create a PDO instance
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set PDO to throw exceptions on error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Retrieve data from the form
    $login = $_POST['login'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Generate a random salt
    $salt = base64_encode(random_bytes(16)); // You can also use other methods to generate a salt

    // Create a hashed password using bcrypt
    $hashedPass = crypt($pass, '$2a$12$' . $salt . '$');

    // Insert data into the database using prepared statements
    $sql = "INSERT INTO uzytkownicy (login, email, haslo) VALUES (:login, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPass); // Store the hashed password

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
