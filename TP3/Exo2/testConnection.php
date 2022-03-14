<?php
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

$sql = "SELECT id,login, pseudo FROM person";
$result = mysqli_query($mysqli, $sql);
echo '<table>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>
    <td>' . $row['id'] . '</td>
    <td>' . $row['login'] . '</td>
    <td>' . $row['pseudo'] . '</td>
    </tr>';
}
echo '</table>
<style>
table,
td {
    border: 1px solid #333;
}

thead,
tfoot {
    background-color: #333;
    color: #fff;
}
</style>';
$mysqli->close();