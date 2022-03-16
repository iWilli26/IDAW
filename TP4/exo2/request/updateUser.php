<?php
$host         = "localhost";
$username     = "root";
$password     = "";
$dbname       = "idawtp3";
$result = 0;

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection to database failed: " . $conn->connect_error);
}
$nom  = $_POST['nom'];
$prenom  = $_POST['prenom'];
$date  = $_POST['date'];
$id  = $_POST['id'];
if ($_POST['like'] == 'true') {
    $like = 1;
} else {
    $like = 0;
}
$rem = $_POST['rem'];

$sql = "update user set nom = '$nom', prenom = '$prenom', date = '$date', user.like = '$like', rem = '$rem' where user.id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();