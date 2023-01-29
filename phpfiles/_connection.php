<?php
$host = "containers-us-west-174.railway.app";
$user = "root";
$passwd = "ICqlgVAS2gc65WCAf5jY";
$database = "railway";

$conn = mysqli_connect($host, $user, $passwd, $database);

if($conn){
    echo "Connection Successful";
}

else{
    echo "Connection failed".mysqli_connect_error();
}
?>