<?php
//Dashboard for consumer
include "_connection.php";

session_start();

if (isset($_SESSION["username"])){

    if($_SESSION["role"] == "seller"){

        $query = "SELECT * FROM ORDERS";
        $result = mysqli_query($conn, $query);
        
    }

    else{
        session_unset();
        session_destroy();
        echo "<script>if(confirm('You are not autherised to access this page.')){document.location.href='LoginPage.php'};</script>";
    }

}

else{
    echo "<script>if(confirm('You are not logged in. Login to continue.')){document.location.href='LoginPage.php'};</script>";
    // echo "something";
    // echo $_SESSION["username"];
}

mysqli_close($conn);


?>