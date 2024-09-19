<?php
session_start();

if ($_SESSION['user']) {
}
else{
	header('Location: ../../autorize.php');
}

?>
<!-- функционал удаления брони столика -->
<?php
if(isset($_POST["id"]))
{
    $conn = new mysqli("localhost", "root", "root", "site");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $userid = $conn->real_escape_string($_POST["id"]);
    $sql = "DELETE FROM orders WHERE id = '$userid'";
    if($conn->query($sql)){
         
        header("Location: ../orders.php");
    }
    else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();  
}
