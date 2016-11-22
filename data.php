<html><head><title>MySQL Table Viewer</title></head><body>
<?php
$servername = "172.32.0.17";
$username = "root";
$password = "test1234";
$dbname = "testdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT firstname, lastname FROM emp";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>FirstName</th><th>LastName</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["firstname"]."</td><td>".$row["lastname"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
</body></html> 
