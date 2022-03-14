<?php
session_start();
// on simule une base de données
$users = array(
    // login => password
    'riri' => 'fifi',
    'yoda' => 'jedi',
    'willi' => 'mdr'
);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "idawtp3";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errorText = "";
$successfullyLogged = false;
if (isset($_POST['login']) && isset($_POST['password'])) {
    $tryLogin = $_POST['login'];
    $tryPwd = $_POST['password'];
    $sql = 'SELECT login,password FROM person WHERE login="' . $tryLogin . '" AND password="' . $tryPwd . '"';
    $result = mysqli_query($mysqli, $sql);
    if ($result->num_rows>0) {
        // $sql = 'SELECT pseudo FROM person WHERE login="' . $tryLogin . '"';
        // $result = mysqli_query($mysqli, $sql);
        $successfullyLogged = true;
        $login = $tryLogin;
        $_SESSION['login'] = $login;
        // si login existe et password correspond
        // if (array_key_exists($tryLogin, $users) && $users[$tryLogin] == $tryPwd) {
        //     $successfullyLogged = true;
        //     $login = $tryLogin;
        //     $_SESSION['login'] = $login;

    } else
        $errorText = "Erreur de login/password";
} else
    $errorText = "Merci d'utiliser le formulaire de login";
if (!$successfullyLogged) {
    echo $errorText;
} else {
    echo "<h1>Bienvenu " . $login . "</h1>";
    echo 'session login : ' . $_SESSION['login'];
}
?>
</br> <a href="./index.php">retour</a>