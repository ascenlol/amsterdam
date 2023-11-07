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
    $adres = $_POST['adres'];
    $kod_pocztowy = $_POST['kod_pocztowy'];
    $telefon = $_POST['telefon'];
    $admin = $_POST['admin'];
    $notatki = $_POST['notatki'];
    // Generate a random salt
    $salt = base64_encode(random_bytes(16)); // You can also use other methods to generate a salt

    // Create a hashed password using bcrypt
    $hashedPass = crypt($pass, '$2a$12$' . $salt . '$');

    // Insert data into the database using prepared statements
    $sql = "INSERT INTO uzytkownicy (login, email, haslo, adres, kod_pocztowy, telefon, admin, notatki) VALUES (:login, :email, :password, :adres, :kod_pocztowy, :telefon, :admin, :notatki)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPass); // Store the hashed password
    $stmt->bindParam(':adres', $adres);
    $stmt->bindParam(':kod_pocztowy', $kod_pocztowy);
    $stmt->bindParam(':telefon', $telefon);
    $stmt->bindParam(':admin', $admin);
    $stmt->bindParam(':notatki', $notatki);
    if ($stmt->execute()) {
        header('location:users2.php');
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
