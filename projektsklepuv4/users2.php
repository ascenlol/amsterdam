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
            <th>Login</th>
            <th>Email</th>
            <th>Adres</th>
            <th>Kod Pocztowy</th>
            <th>Telefon</th>
            <th>Admin</th>
            <th>Notatki</th>
            <th>Edit</th>
            <th>Delete</th>
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
      

        $query = "SELECT * FROM uzytkownicy";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['ID']}</td>";
            echo "<td>{$row['login']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['adres']}</td>";
            echo "<td>{$row['kod_pocztowy']}</td>";
            echo "<td>{$row['telefon']}</td>";
            echo "<td>{$row['admin']}</td>";
            echo "<td>{$row['notatki']}</td>";
            echo "<td><a href='edit.php?id={$row['ID']}'>Edit</a></td>";
            echo "<td><a href='delete.php?id={$row['ID']}'>Delete</a></td>";
            echo "</tr>";
        }
        mysqli_close($conn);
        ?>
    </table>
</form>
 <div class="row">
            <div class="col-md-4 offset-md-4 form">
            <form action="register.php" method="POST">
<div class="nwm">
        <div style="float:left;">
        <label for="login">Użytkownik:</label><br>
        <input type="text" name="login" required><br><br>
    </div>

        <div style="float:left;">
        <label for="email">Email:</label><br>
        <input type="email" name="email" required><br><br>
     </div>

        <div style="float:left;">
        <label for="password">Hasło:</label><br>
        <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Musi zawierać przynajmniej jedną cyfrę, jedną dużą i jedną małą literę. Min. 8 znaków." required required><br><br>
    </div>

        <div style="float:left;">
        <label for="adres">Adres:</label><br>
        <input type="text" name="adres" required><br><br>
    </div>

        <div style="float:left;">
        <label for="kod_pocztowy">Kod pocztowy:</label><br>
        <input type="text" name="kod_pocztowy" required><br><br>
    </div>

        <div style="float:left;">
        <label for="telefon">Telefon:</label><br>
        <input type="text" name="telefon" required><br><br>
    </div>
    
        <div style="float:left;">
        <label for="admin">Admin:</label><br>
        <input type="text" name="admin"><br><br>
    </div>

        <div style="float:left;">
        <label for="notatki">Notatki:</label><br>
        <input type="text" name="notatki"><br><br>
    </div>

    <br>
        <input type="submit" value="Dodaj użytkownika" class='przycisk'>
    </div>    
    </form>