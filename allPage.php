<?php
require_once 'setting.php';
$con = $this->connect();
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
