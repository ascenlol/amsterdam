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

    // Prepare and execute a query to select all records from a table
    $stmt = $conn->prepare("SELECT * FROM produkty");
    $stmt->execute();

    // Fetch all records into an associative array
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        nav {
            background-color: #444;
            padding: 10px 0;
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }
        nav ul li a:hover {
            text-decoration: underline;
        }
    </style>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<header>
        <h1>Panel administracyjny</h1>
    </header>
    <nav>
        <ul>
            <li><a href="admin_dashboard.php">Wróć</a></li>
        </ul>
    </nav>
    <table>
        <tr>
            <?php
            // Display table headers (column names)
            foreach ($result[0] as $key => $value) {
                echo "<th>$key</th>";
            }
            ?>
        </tr>
        <?php
        // Display table rows with data
        foreach ($result as $row) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
    <a href="admin_dashboard.php">Home</a>
</body>
</html>