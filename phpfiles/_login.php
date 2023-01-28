<?php
    

    function authentication($username, $password){

        include "_connection.php";
        
        $query = "SELECT * FROM LOGINDATA WHERE USERNAME = '$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 0){
            return [FALSE];
        }

        else{
            $row = mysqli_fetch_array($result);

            $salt = $row["Salt"];
            $correcthash = $row["Hash"];            

            if (password_verify($password.$salt, $correcthash)){
                return [TRUE, $row["Role"]];
            }

            else{
                return [FALSE];
                }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = $_POST["uname"];
        $password = $_POST["password"];

        $loginpass = authentication($username, $password);

        if ($loginpass[0]){
            session_start();
            $_SESSION["username"] = $username;
            


            if ($loginpass[1] == "user"){
                // echo $texst;
                $_SESSION["role"] = "user";
                echo "<script>document.location.href='UserDash.php';</script>";
            }
            elseif($loginpass[1] == "farmer"){
                $_SESSION["role"] = "farmer";
                echo "<script>document.location.href='Admin.php';</script>";
            }
        }

        else{
            echo "<script>alert('Wrong cridentials!!')</script>";
        }
    }

?>