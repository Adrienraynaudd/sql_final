<?php
require_once 'setting.php';
$con = $this->connect();
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 $result = mysqli_query($con, "SELECT * FROM `users`");
while ($row = mysqli_fetch_array($result)) {
    echo $row['username'];
    echo "<br>";
}
?>
