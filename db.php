<?php
function db_connect() {
    static $connection;
    if (!isset($connection)) {
        $config = parse_ini_file("config.ini");
        $connection = mysqli_connect("localhost", $config["username"], $config["password"], $config["database"]);
        if (!$connection) {
            echo mysqli_connect_error();
            return;
        } else {
            return $connection;
        }
    } else {
        return $connection;
    }
}
function db_close($connection) {
    if ($connection) {
        mysqli_close($connection);
    } else {
        echo "NOPE";
    }
}
?>