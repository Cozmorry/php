<?php

$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'campaign_feedback';


$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connection success!";
}
