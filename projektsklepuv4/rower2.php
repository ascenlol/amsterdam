<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <style>

    
/* Add your CSS styles here */
.tlo {
    background-image: url("bwbg.png");
}
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

        <form action="process.php" method="post">
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Opis</th>
            <th>Cena</th>
            <th>ID kategorii</th>
            <th>ID sprzedającego</th>
            <th>Edycja</th>
            <th>Usuwanie</th>
        </tr>
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
      

        $query = "SELECT * FROM produkty";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['ID']}</td>";
            echo "<td>{$row['nazwa']}</td>";
            echo "<td>{$row['opis']}</td>";
            echo "<td>{$row['cena']}</td>";
            echo "<td>{$row['ID_kategoria']}</td>";
            echo "<td>{$row['ID_sprzedajacy']}</td>";
            echo "<td><a href='editrower.php?id={$row['ID']}'>Edit</a></td>";
            echo "<td><a href='deleterower.php?id={$row['ID']}'>Delete</a></td>";
            echo "</tr>";
        }
        mysqli_close($conn);
        ?>
    </table>
</form>
 <div class="row">
            <div class="col-md-4 offset-md-4 form">
            <form action="nowyrower.php" method="POST">
<div class="nwm">
        <div style="float:left;">
        <label for="nazwa">Nazwa:</label><br>
        <input type="text" name="nazwa" required><br><br>
    </div>

        <div style="float:left;">
        <label for="opis">Opis:</label><br>
        <input type="text" name="opis" required><br><br>
     </div>

        <div style="float:left;">
        <label for="cena">cena:</label><br>
        <input type="text" name="cena" required><br><br>
    </div>

        <div style="float:left;">
        <label for="ID_kategoria">ID kategorii:</label><br>
        <input type="text" name="ID_kategoria" required><br><br>
    </div>

        <div style="float:left;">
        <label for="ID_sprzedajacy">ID sprzedajacego:</label><br>
        <input type="text" name="ID_sprzedajacy" required><br><br>
    </div>
    <br>
        <input type="submit" value="Dodaj użytkownika" class='przycisk'>
    </div>    
    </form>