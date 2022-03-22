<?php
$host         = "localhost";
$username     = "root";
$password     = "";
$dbname       = "idawtp3";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection to database failed: " . $conn->connect_error);
}

switch ($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        $sql = "select * from user";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $array_values[] = $row;
            }
        } else {
            echo "0 results";
        }

        echo json_encode($array_values);
        $conn->close();
        break;
    case 'DELETE':
        $sql = "DELETE FROM user WHERE id = " . $_GET['id'];
        if ($conn->query($sql) === TRUE) {
            echo "success";
        } else {
            echo "erreur";
        }
        $conn->close();
        break;
    case 'POST':
        if ($_POST['type'] == "update") {
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
        } else {
            $nom  = $_POST['nom'];
            $prenom  = $_POST['prenom'];
            $date  = $_POST['date'];
            if ($_POST['like'] == 'true') {
                $like = 1;
            } else {
                $like = 0;
            }
            $rem = $_POST['rem'];

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
            $conn->close();
        }
        break;
}