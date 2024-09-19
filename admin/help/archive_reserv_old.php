<?php
session_start();

if ($_SESSION['user']) {
}
else{
	header('Location: ../../autorize.php');
}

?>
<!-- функционал для переноса отменённый брони столика в архив бд "reservarchive"-->
<?php

$conn = new mysqli("localhost", "root", "root", "site");
$userid = $conn->real_escape_string($_POST["id"]);
$userastatus = "отменённые";

if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}

if(isset($_POST["id"])){
    
    $sql = "UPDATE reservation SET status = '$userastatus' WHERE id = '$userid'";
    
    if($conn->query($sql)){
        
        if(isset($_POST["id"])){
            
            $sql = "INSERT INTO reservarchive (date,time,guestcount,name,phonenumber,email,status) SELECT date,time,guestcount,name,phonenumber,email,status FROM reservation WHERE id = '$userid'";
            
            if($conn->query($sql)){
                
                if(isset($_POST["id"])){
                
                    $sql = "DELETE FROM reservation WHERE id = '$userid'";
                    
                    if($conn->query($sql)){
                        
                        header("Location: ../indexadmin.php");
                    
                    }
                    else{
                        echo "Ошибка: " . $conn->error;
                    }
                    $conn->close();
                }
            
            }else{
                echo "Ошибка: " . $conn->error;
            }$conn->close();
        }
    
    }
    else{
        echo "Ошибка: " . $conn->error;
    }$conn->close();
}