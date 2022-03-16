<?php
$host         = "localhost";
$username     = "root";
$password     = "";
$dbname       = "idawtp3";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection to database failed: " . $conn->connect_error);
}

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