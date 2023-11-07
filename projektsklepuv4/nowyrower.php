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
    $nazwa = $_POST['nazwa'];
    $opis = $_POST['opis'];
    $cena = $_POST['cena'];
    $ID_kategoria = $_POST['ID_kategoria'];
    $ID_sprzedajacy = $_POST['ID_sprzedajacy'];
    // Generate a random salt
    $salt = base64_encode(random_bytes(16)); // You can also use other methods to generate a salt



    // Insert data into the database using prepared statements
    $sql = "INSERT INTO produkty (nazwa, opis, cena, ID_kategoria, ID_sprzedajacy) VALUES (:nazwa, :opis, :cena, :ID_kategoria, :ID_sprzedajacy)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nazwa', $nazwa);
    $stmt->bindParam(':opis', $opis);
    $stmt->bindParam(':cena', $cena);
    $stmt->bindParam(':ID_kategoria', $ID_kategoria);
    $stmt->bindParam(':ID_sprzedajacy', $ID_sprzedajacy);
    if ($stmt->execute()) {
        header('location:rower2.php');
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
