<?php
session_start();
// on simule une base de données
$users = array(
    // login => password
    'riri' => 'fifi',
    'yoda' => 'jedi',
    'willi' => 'mdr'
);
$login = "anonymous";
$errorText = "";
$successfullyLogged = false;

if (isset($_POST['login']) && isset($_POST['password'])) {
    $tryLogin = $_POST['login'];
    $tryPwd = $_POST['password'];
    // si login existe et password correspond
    if (array_key_exists($tryLogin, $users) && $users[$tryLogin] == $tryPwd) {
        $successfullyLogged = true;
        $login = $tryLogin;
        $_SESSION['login'] = $login;
    } else
        $errorText = "Erreur de login/password";
} else
    $errorText = "Merci d'utiliser le formulaire de login";
if (!$successfullyLogged) {
    echo $errorText;
} else {
    echo "<h1>Bienvenu " . $login . "</h1>";
    echo 'session login : '.$_SESSION['login'];
}
?>
</br> <a href="./index.php">retour</a>