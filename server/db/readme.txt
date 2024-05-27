In ../config/config.php change the getDatabase() into:

function getDatabase() {
    $dbHost = 'localhost';
    $dbUsername = 'u907822938_testprojectdb';
    $dbPassword = 'F:0*#2@:Az';
    $dbName = 'u907822938_testprojectdb';
    $connection = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
    if (!$connection) {
        die("Can't connect to the database server. Error: " . mysqli_connect_error());
    }
    return $connection;
}

when publishing the system.