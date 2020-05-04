<?php

require_once("dbcredentials.php");

function db_connect() {
    $connection = mysqli_connect(DATABASESERVER, DATABASEUSER, DATABASEPASSWORD, DATABASENAME);
    return $connection;
}

function disconnect($connection) {
    if(isset($connection)) {
        mysqli_close($connection);
    }
}