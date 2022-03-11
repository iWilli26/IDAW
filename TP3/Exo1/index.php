<div class="form"></div>
<form id="login_form" action="connected.php" method="POST">
    <table>
        <tr>
            <th>Login :</th>
            <td><input type="text" name="login"></td>
        </tr>
        <tr>
            <th>Mot de passe :</th>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="Se connecter..." /></td>
        </tr>
    </table>
</form>


<form id="style_form" action="index.php" method="GET">
    <select onchange="" name="css">
        <option value="style1">style1</option>
        <option value="style2">style2</option>
    </select>
    <input type="submit" value="Appliquer" />
</form>

<?php
unset($_POST['disconnect']);

session_start();

if (!isset($_COOKIE['css'])) {
    if (isset($_GET['css'])) {
        echo '<link rel="stylesheet" href=./' . $_GET['css'] . '.css />';
        setcookie('css', $_GET['css']);
    } else {
        echo '<link rel="stylesheet" href=./style1.css />';
    }
} else {
    echo '<link rel="stylesheet" href=./' . $_COOKIE['css'] . '.css />';
}
echo 'session login : ' . $_SESSION['login'];
echo $_POST['disconnect'];
if(isset($_POST['disconnect'])){
    
}
?>