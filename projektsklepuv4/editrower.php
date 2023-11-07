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

if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];

    $query = "SELECT * FROM prudukty WHERE ID = $ID";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $nazwa = $_POST['nazwa'];
    $opis = $_POST['opis'];
    $cena = $_POST['cena'];
    $ID_kategoria = $_POST['ID_kategoria'];
    $ID_sprzedajacego = $_POST['ID_sprzedajacego'];

    $query = "UPDATE produkty SET nazwa='$nazwa', opis='$opis', cena='$cena', ID_kategoria='$ID_kategoria', ID_sprzedajacego='$ID_sprzedajacego' WHERE ID=$ID";
    mysqli_query($conn, $query);

    // Redirect back to the main table
    header("Location: rower2.php");
}
?>

<form action="" method="post">
    <input type="hidden" name="id" value="<?php echo $ID; ?>">
    Nazwa: <input type="text" name="nazwa" value="<?php echo $row['nazwa']; ?>"><br>
    Opis: <input type="text" name="opis" value="<?php echo $row['opis']; ?>"><br>
    Cena: <input type="text" name="cena" value="<?php echo $row['cena']; ?>"><br>
    ID kategorii: <input type="text" name="ID_kategoria" value="<?php echo $row['ID_kategoria']; ?>"><br>
    ID sprzedajacego: <input type="text" name="ID_sprzedajacego" value="<?php echo $row['ID_sprzedajacego']; ?>"><br>
    <input type="submit" name="update" value="Update">
</form>