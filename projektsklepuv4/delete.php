<?php
              // Fetch data from the MySQL database and populate the table rows
              // Replace the database credentials and connection code with your own
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "kradziezrower";
      
              $conn = new mysqli($servername, $username, $password, $dbname);
      
              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              }

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM uzytkownicy WHERE ID = $id";
    mysqli_query($conn, $query);

    // Redirect back to the main table
    header("Location: users2.php");
}
?>