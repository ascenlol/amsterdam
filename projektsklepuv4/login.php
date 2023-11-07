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
    $enteredLogin = $_POST['login'];
    $enteredPass = $_POST['password'];

    // Check if the user exists
    $stmt = $conn->prepare("SELECT ID, login, haslo, admin FROM uzytkownicy WHERE login = :login");
    $stmt->bindParam(':login', $enteredLogin);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($enteredPass, $user['haslo'])) {
        if ($user['admin'] == 1) {
             header("Location: admin_dashboard.php"); // Redirect to the regular user dashboard
                exit();
        } else {
             header("Location: user_dashboard.php"); // Redirect to the regular user dashboard
                exit();
        }
    } else {
        echo "Login failed. Please check your credentials.";
    }
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>