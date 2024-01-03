<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Use a consistent connection variable name
        $pdo = new PDO("sqlsrv:server = tcp:little-wing-server.database.windows.net,1433; Database = little-wing-db", "amirkhalid", "Freya1212");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Use prepared statements to prevent SQL injection
        $stmt = $pdo->prepare("SELECT email, password FROM Students");
        $stmt->execute();

        // Fetch the results as an associative array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Close the connection
        $pdo = null;

        // Encode the results as JSON and print
        echo json_encode($results);
    } catch (PDOException $e) {
        // Print detailed error information
        die("Error connecting to SQL Server: " . $e->getMessage());
    }
} else {
    // Respond with 405 Method Not Allowed for non-GET/POST requests
    header('HTTP/1.1 405 Method Not Allowed');
    header('Allow: GET, POST');
    die('Method Not Allowed');
}
?>
