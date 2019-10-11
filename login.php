<?php
$username=filter_input(INPUT_POST,"username");
$password=filter_input(INPUT_POST,"password");

if(!empty($username)){
    if(!empty($password)){
        $host="localhost";
        $dbusername="root";
        $dbpassword="";
        $conn=new mysql($host,$dbusername, $dbpassword);
        if(mysqli_connect_error()){
            die("connect error(".mysqli_connect_errno().")"
            .mysqli_connect_error());
        }
        else{

            $sql="INSERT INTO account(username , password)
            values('$username','$password')";
            if($conn->query($sql)){
                echo "new record inserted";
            }
            else{
                echo "error: ".$sql."<br>".$conn->error;

            }
            $conn->close();
            }
        }

    }else{
        echo "password should not be empty";
        die();
    }
}
else{echo "username should not be empty";
die();
}
?>