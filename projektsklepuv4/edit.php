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

    $query = "SELECT * FROM uzytkownicy WHERE ID = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $adres = $_POST['adres'];
    $kod_pocztowy = $_POST['kod_pocztowy'];
    $telefon = $_POST['telefon'];
    $admin = $_POST['admin'];
    $notatki = $_POST['notatki'];

    $query = "UPDATE uzytkownicy SET login='$login', email='$email', adres='$adres', kod_pocztowy='$kod_pocztowy', telefon='$telefon', admin='$admin', notatki='$notatki' WHERE ID=$id";
    mysqli_query($conn, $query);

    // Redirect back to the main table
    header("Location: users2.php");
}
?>

<form action="" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    Login: <input type="text" name="login" value="<?php echo $row['login']; ?>"><br>
    Email: <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
    Adres: <input type="text" name="adres" value="<?php echo $row['adres']; ?>"><br>
    Kod Pocztowy: <input type="text" name="kod_pocztowy" value="<?php echo $row['kod_pocztowy']; ?>"><br>
    Telefon: <input type="text" name="telefon" value="<?php echo $row['telefon']; ?>"><br>
    Admin: <input type="text" name="admin" value="<?php echo $row['admin']; ?>"><br>
    Notatki: <input type="text" name="notatki" value="<?php echo $row['notatki']; ?>"><br>
    <input type="submit" name="update" value="Update">
</form>