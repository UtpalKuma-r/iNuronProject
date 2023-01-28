<?php
    

    function authentication($username, $password){

        include "_connection.php";
        
        $query = "SELECT * FROM LOGINDATA WHERE USERNAME = '$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 0){
            // echo "<script>alert('No user found!!')</script>";
            return [FALSE];
        }

        else{
            $row = mysqli_fetch_array($result);

            $salt = $row["salt"];
            $correcthash = $row["hash"];            

            if (password_verify($password.$salt, $correcthash)){
                return [TRUE, $row["role"]];
            }

            else{
                // echo "<script>alert('test $salt $correcthash Password mismatch!!')</script>";
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
            
            echo "<script>alert('$username logged in!!')</script>";

            if ($loginpass[1] == "seller"){
                // echo $texst;
                $_SESSION["role"] = "seller";
                echo "<script>document.location.href='Admin.php';</script>";
            }
            elseif($loginpass[1] == "consumer"){
                $_SESSION["role"] = "consumer";
                echo "<script>document.location.href='UserDash.php';</script>";
            }
        }

        else{
            echo "<script>alert('Wrong cridentials!!')</script>";
        }
    }

?>