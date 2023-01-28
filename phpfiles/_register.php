<?php
    include "_connection.php";
    // mysqli_select_db($conn, "EASYAPPLICATION");

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function checkduplicate($username, $phonenumber, $email){
        
        include "_connection.php";

        $query = "SELECT * FROM USERDATA WHERE USERNAME = '$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) != 0){
            return [FALSE, "USERNAME already in use"];
        }

        else{
            $query = "SELECT * FROM USERDATA WHERE PHONENUMBER = '$phonenumber'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) != 0){
                return [FALSE, "Phone Number already in use"];
            }

            else{
                $query = "SELECT * FROM USERDATA WHERE EMAIL = '$email'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) != 0){
                return [FALSE, "Email already in use"];
                }

                else{
                return [TRUE];
                }
        }
    }
}

function extentioncheck($Image){
    $someData = explode('.', $Image["name"]);
    $imageExtention = strtolower(end($someData));
    $allowedExtention = array('png', 'jpg', 'jpeg');

    return in_array($imageExtention, $allowedExtention);
}

    if ($_SERVER['REQUEST_METHOD'] == "POST"){

        if ($_POST["password"] == $_POST["cpassword"]){
            $username = $_POST["uname"];
            $role = $_POST["who"];
            $firstname = $_POST["fname"];
            $lastname = $_POST["lname"];
            $dob = $_POST["dob"];
            $phonenumber = $_POST["phonenumber"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $image = $_FILES["image"];
            $address = $_POST["a1"].", ".$_POST["a2"].", ".$_POST["a3"].", ".$_POST["a4"].", ".$_POST["a5"];
            $city = $_POST["a2"];
            $pincode = $_POST["a4"];
            $salt = generateRandomString();

            $passwordhash = password_hash($password.$salt, PASSWORD_DEFAULT);

            $duplicate = checkduplicate($username, $phonenumber, $email);

            if (!$duplicate[0]){
                echo "<script>alert('$duplicate[1]')</script>";
            }

            else{

                if (extentioncheck($image)){

                    // if ($image["size"] > 90000){
                        echo "<script>alert('$role')</script>";
                    // }

                    

                        $imagedestination = "userImage/".$username.$image["name"];

                            if(move_uploaded_file($image["tmp_name"], $imagedestination)){                                
                                    // mysqli_select_db($conn, "easyapplication");
                                $query = "INSERT INTO USERDATA VALUES('$username', '$role', '$firstname', '$lastname', '$dob', '$phonenumber', '$email','$address', '$city', '$pincode', '$imagedestination')";
                                $result = mysqli_query($conn, $query);   
                                
                                if ($result){
                                        // mysqli_select_db($conn, "easyapplication");
                                    $query = "INSERT INTO LOGINDATA VALUES('$username', '$salt', '$passwordhash', '$role')";
                                    $result = mysqli_query($conn, $query);

                                    if ($result){
                                        echo "<script>if(confirm('Your Record $password Sucessfully Inserted $salt. Now Login $passwordhash')){document.location.href='LoginPage.php'};</script>";
                                    }
                                }
                            }
                    
                }

                else{
                    echo "<script>alert('File extention must be png/jpg/jpeg. Others are not supported')</script>";
                }
            }   			
        }

    }
?>