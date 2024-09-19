<?php
session_start();

if ($_SESSION['user']) {
}
else{
	header('Location: ../../autorize.php');
}

?>
<!-- окно обновления забронированных столов, куда переходят с помощью кнопки update -->
<?php 
try {
    $conn = new PDO("mysql:host=localhost;dbname=site", "root", "root");
}
catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
<title>update</title>
<meta charset="utf-8" />
</head>
<body>
<?php
// если запрос GET
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]))
{
    $userid = $_GET["id"];
    $sql = "SELECT * FROM reserv_done WHERE id = :userid";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":userid", $userid);
    // выполняем выражение и получаем пользователя по id
    $stmt->execute();
    if($stmt->rowCount() > 0){
        foreach ($stmt as $row) {
            $userdate = $row["date"];
            $usertime = $row["time"];
            $userguestcount = $row["guestcount"];
            $username = $row["name"];
            $userphonenumber = $row["phonenumber"];
            $useremail = $row["email"];
        }
        echo "<h3>Обновление брони</h3>
                <form method='post'>
                    <input type='hidden' name='id' value='$userid' />
                    <p>Дата:
                    <input type='text' name='date' value='$userdate' /></p>
                    <p>Время:
                    <input type='text' name='time' value='$usertime' /></p>
                    <p>Гости:
                    <input type='text' name='guestcount' value='$userguestcount' /></p>
                    <p>Имя:
                    <input type='text' name='name' value='$username' /></p>
                    <p>Номер телефона:
                    <input type='text' name='phonenumber' value='$userphonenumber' /></p>
                    <p>Почта:
                    <input type='text' name='email' value='$useremail' /></p>
                    <input type='submit' value='Сохранить' />
            </form>";
    }
    else{
        echo "Пользователь не найден";
    }
}
elseif (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["date"])) {
      
    $sql = "UPDATE reserv_done SET date = :userdate, time = :usertime, guestcount = :userguestcount, name = :username, phonenumber = :userphonenumber, email = :useremail WHERE id = :userid";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":userid", $_POST["id"]);
    $stmt->bindValue(":username", $_POST["name"]);
    $stmt->bindValue(":userdate", $_POST["date"]);
    $stmt->bindValue(":usertime", $_POST["time"]);
    $stmt->bindValue(":userguestcount", $_POST["guestcount"]);
    $stmt->bindValue(":userphonenumber", $_POST["phonenumber"]);
    $stmt->bindValue(":useremail", $_POST["email"]);
          
    $stmt->execute();
    header("Location: ../reserv_done.php");
}
else{
    echo "Некорректные данные";
}
?>
</body>
</html>