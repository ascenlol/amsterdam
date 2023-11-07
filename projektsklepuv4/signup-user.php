<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Panel rejestracji    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styl.css">
</head>
<body>
 
    <div class="container">
    <div class="tytul">
    <p>KradzioneRowery<p>
</div> 
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
            <form action="register.php" method="POST">
        <label for="login">Użytkownik:</label><br>
        <input type="text" name="login" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label for="password">Hasło:</label><br>
        <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Musi zawierać przynajmniej jedną cyfrę, jedną dużą i jedną małą literę. Min. 8 znaków." required required><br><br>

        <input type="submit" value="Zarejestruj" class='przycisk'>
        
    </form>
    <form action="index.html" class='anuluj'>
    <input type="submit" value="Anuluj" />
</form>
            </div>
        </div>
    </div>
    
</body>
</html>