<?php
$dbhost = "172.32.0.17";
$dbuser = "root";
$dbpass = "test1234";
$dbname = "testdb";

ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');
error_reporting(E_ALL);

$mysqli = new mysqli("$dbhost", "$dbuser", "$dbpass", "$dbname");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!$stmt = $mysqli->query("SELECT firstname, lastname FROM emp")) {
    echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
}

$result = $mysqli->query("SELECT firstname, lastname FROM emp");

if ($result->num_rows > 0) {

echo "EMP INFORMATION";
echo "<table border='1' cellpadding='2' cellspacing='2'";
echo "<tr><td>FIRSTNAME</td><td>LASTNAME</td>";
while ($row = mysqli_fetch_array($stmt)) {
        echo "<tr>";
        echo "<td>". $row['firstname'] ."</td>";
        echo "<td>". $row['lastname'] ."</td>";
        echo "</tr>";
}
}
else {
    echo "No records found";
}
$stmt->free();
$mysqli->close();
?>
