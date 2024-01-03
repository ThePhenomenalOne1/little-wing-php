<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Your existing PHP code here
} else {
    header('HTTP/1.1 405 Method Not Allowed');
    header('Allow: GET, POST');
    die('Method Not Allowed');
}

// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:little-wing-server.database.windows.net,1433; Database = little-wing-db", "amirkhalid", "Freya1212");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "amirkhalid", "pwd" => "Freya1212", "Database" => "little-wing-db", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:little-wing-server.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

// Check if the connection is successful
if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
}

// Execute the SELECT query
$sql = "SELECT email, password FROM Students";
$stmt = sqlsrv_query($conn, $sql);

// Check if the query execution is successful
if (!$stmt) {
    die(print_r(sqlsrv_errors(), true));
}

// Fetch the results and store them in an array
$results = array();
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $results[] = $row;
}

// Close the connection
sqlsrv_close($conn);

// Encode the results as JSON and print
echo json_encode($results);
?>
