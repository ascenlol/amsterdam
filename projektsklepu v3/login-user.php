<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Panel logowania</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styl.css">
</head>
<body>

    <div class="container">
    <div class="tytul">
    <p>KradzioneRowery<p>
</div>
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                        <form action="login.php" method="POST">
            <label for="login">Użytkownik:</label><br>
            <input type="text" name="login" required><br><br>
    
            <label for="password">Hasło:</label><br>
            <input type="password" name="password" required><br><br>
    
            <input type="submit" value="Login" class='przycisk'>
            
        </form>
        <form action="index.html" class='anuluj'>
    <input type="submit" value="Anuluj" />
            </div>
        </div>
    </div>
    
</body>
</html>