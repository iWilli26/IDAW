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
if ($_POST['like'] == true) {
    $like = 1;
} else {
    $like = 0;
}
$rem  = $_POST['rem'];

if (!$nom || !$prenom) {
    $result = 2;
} else {
    $sql    = "insert into user (nom, prenom, date, user.like, rem) values ('$nom','$prenom','$date','$like','$rem')  ";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        $result = 1;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
echo $result;
$conn->close();