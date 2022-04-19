<?php 
    $DB_host = "localhost";
    $DB_username = "root";
    $DB_password = "";
    $DB_name = "river_cruise_cms";

    $connection = new mysqli($DB_host, $DB_username, $DB_password, $DB_name);

    if($connection->connect_error){
        die();
    }

    