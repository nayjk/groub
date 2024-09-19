<?php
session_start();

if ($_SESSION['user']) {
}
else{
	header('Location: ../../autorize.php');
}

?>
<!-- функционал для переноса подтверждённой брони столика в архив бд "reservarchive"-->
<?php

$conn = new mysqli("localhost", "root", "root", "site");
$userid = $conn->real_escape_string($_POST["id"]);
$userastatus = "доставка курьером 2";

if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}

if(isset($_POST["id"])){
    
    $sql = "UPDATE orders SET status = '$userastatus' WHERE id = '$userid'";
    
    if($conn->query($sql)){
        
        if(isset($_POST["id"])){
            
            $sql = "INSERT INTO delivery (name,phonenumber,date,time,orders,status,cost,adress) SELECT name,phonenumber,date,time,orders,status,cost,adress FROM orders WHERE id = '$userid'";
            
            if($conn->query($sql)){
                
                if(isset($_POST["id"])){
                
                    $sql = "DELETE FROM orders WHERE id = '$userid'";
                    
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