<?php
session_start();

if ($_SESSION['user']) {
}
else{
	header('Location: ../../autorize.php');
}

?>
<!-- функционал для переноса отменённый отменённого заказа в архив бд "orders_archive"-->
<?php

$conn = new mysqli("localhost", "root", "root", "site");
$userid = $conn->real_escape_string($_POST["id"]);
$userastatus = "архив";

if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}

if(isset($_POST["id"])){
    
    $sql = "UPDATE delivery SET status = '$userastatus' WHERE id = '$userid'";
    
    if($conn->query($sql)){
        
        if(isset($_POST["id"])){
            
            $sql = "INSERT INTO orders_archive (name,phonenumber,date,time,orders,status,cost,adress) SELECT name,phonenumber,date,time,orders,status,cost,adress FROM delivery WHERE id = '$userid'";
            
            if($conn->query($sql)){
                
                if(isset($_POST["id"])){
                
                    $sql = "DELETE FROM delivery WHERE id = '$userid'";
                    
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