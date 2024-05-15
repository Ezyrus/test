In ../config/config.php change the getDatabase() into:

function getDatabase() {
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'test-projectdb';
    $connection = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
    if (!$connection) {
        die("Can't connect to the database server. Error: " . mysqli_connect_error());
    }
    return $connection;
}

when publishing the system.