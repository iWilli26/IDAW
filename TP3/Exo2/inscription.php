<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "idawtp3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<form action="inscription.php" method="POST">
    <input type="text" name="login" placeholder="Entrez votre Nom">
    <input type="text" name="password" placeholder="Entrez votre mot de passe">
    <input type="text" name="pseudo" placeholder="Entrez votre Pseudo">
    <input type="submit">
</form>

<?php
if (array_key_exists('login', $_POST) && array_key_exists('password', $_POST) && array_key_exists('pseudo', $_POST)) {
    $sqlCheck = 'SELECT login FROM person WHERE login="' . $_POST['login'] . '"';
    $check = mysqli_query($conn, $sqlCheck);
    if ($check->num_rows > 0) {
        echo 'Ce login est déjà utilisé';
    } else {
        $sql = 'INSERT INTO person (login, password, pseudo) VALUES ("' . $_POST['login'] . '","' . $_POST['password'] . '","' . $_POST['pseudo'] . '")';
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
$conn->close();
?>
<br>
<a href="index.php">Retour</a>