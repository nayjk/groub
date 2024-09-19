<?php
session_start();

if ($_SESSION['user']) {
}
else{
	header('Location: ../autorize.php');
}

?>
<!-- для передачи бронирования -->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connect = new PDO("mysql:host=localhost; dbname=site;", 'root','root');
    if (isset($_POST['date'])) { //isset for date
        $date = $_POST['date'];
        $time = $_POST['time'];
        $guestcount = $_POST['guestcount'];
        $name = $_POST['name'];
        $phonenumber = $_POST['phonenumber'];
        $email = $_POST['email'];
        $status = "подтверждён";
        $query = $connect->query ("INSERT INTO site.reserv_done (date,time,guestcount,name,phonenumber,email,status) VALUES ('$date','$time','$guestcount','$name','$phonenumber','$email','$status')");
        }
    // Перенаправление на текущую страницу
    header("Location: {$_SERVER['REQUEST_URI']}");
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Главная</title>

	<link rel="stylesheet" href="../css/main.css">

</head>
<body>
	<div class="wrapper">
		<div class="scroll">
			<a class="caption archiveordershtml" href="archiveorders.php">Архив заказов</a>
			<a class="caption reservarchivehtml" href="reservarchive.php">Архив броней</a>
			<a class="caption staffhtml" href="comments.php">Отзывы<a>
			<a class="caption indexhtml" href="indexadmin.php">Главная<a></a>
			<a class="caption reservhtml" href="reserv_done.php">Брони<a></a>
			<a class="caption deliveryhtml" href="delivery.php">Доставка<a></a>
			<a class="caption orderhtml" href="orders.php">Заказы<a></a>
			<a class="caption autohtml" href="../vendor/logout.php" class="logout">Выход</a>
		</div>
		<div class="content">
			<article class="main-article">
                <img class="up" src="img/background/up.png">
				<a class="big dungeon_text10"> Архив броней столиков </a>
				<!-- вывод таблицы броней столиков reserv -->
				<?php
// вывод столиков из бд
$conn = new mysqli("localhost", "root", "root", "site");
$sql = "SELECT * FROM reservarchive";
if($result = $conn->query($sql)){
	?> <div class="tables"> <?php

    echo "<table>
            <tr>
				<th class = marjin_left></th>
                <th class = marjin_left>Дата</th>
                <th class = marjin_left>Время</th>
                <th class = marjin_left>Гости</th>
                <th class = marjin_left>Имя</th>
                <th class = marjin_left>Телефон</th>
                <th class = marjin_left>Почта</th>
                <th class = marjin_left>Статус</th>
                <th></th>
            </tr>";
            "<tr> </tr>";
    foreach($result as $row){

		echo "<tr>";

            echo "<td class = marjin_left>" . $row["date"] . "</td>";
            echo "<td class = marjin_left>" . $row["time"] . "</td>";
            echo "<td class = marjin_left>" . $row["guestcount"] . "</td>";
            echo "<td class = marjin_left>" . $row["name"] . "</td>";
            echo "<td class = marjin_left>" . $row["phonenumber"] . "</td>";
            echo "<td class = marjin_left>" . $row["email"] . "</td>";
            echo "<td class = marjin_left>" . $row["status"] . "</td>";
            echo "<td class = marjin_left>
                    <form action='help/delete_reserv.php' method='post'>
                        <input type='hidden' name='id' value='" . $row["id"] . "' />
                        <input type='submit' value='Удалить'>
                    </form>
            </td>";
        echo "</tr>";
    }
    echo "</table>";
	?> </div> <?php
    $result->free();
	
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>

			</article>
		</div>
	</div>

</body>
</html>
<!-- для текста -->
<style>
.marjin_left{
    padding: 0.5vw;
	font-size: 1vw;
}
.marjin_left1{
    width: 0.5vw;
	height: 0.5vw;
	position: absolute;
}
.tables{
	margin-top: calc(var(--index) * 10);
	margin-left: calc(var(--index) * 3);
	position: absolute;
}
.caption{
	font-size: calc(var(--index) * 0.75);
	position: absolute;
  	color: #000000; /* Цвет обычной ссылки */
}
.big{
	font-size: calc(var(--index) * 2);
	position: absolute;
  	color: #ffffff; /* Цвет обычной ссылки */
}
.dungeon_text10{
	/* Найтхорм */
    color: #ffffff;
	margin-top: calc(var(--index) * 2.8);
  	margin-left: calc(var(--index) * 18);
	text-align: left;
}
/* для панели переключения между страницами */
.up{
	margin-top: 0;
	width: 100vw;
	height: 8vh;
	position: absolute;
	z-index: 10;
}
.scroll{
	z-index: 99;
	width: 100vw;
	height: 4vw;
	position: absolute;

}
.archiveordershtml{
	text-shadow: 0 0 1vw #ffffff;
	text-decoration: none;
	color:rgb(255, 255, 255);
	margin-left: calc(var(--index) * 3);
	margin-top: calc(var(--index) * 0.7);
}
.reservarchivehtml{
	text-shadow: 0 0 1vw #ffffff;
	text-decoration: none;
	color:rgb(255, 255, 255);
	margin-left: calc(var(--index) * 11);
	margin-top: calc(var(--index) * 0.7);
}
.staffhtml{
	text-shadow: 0 0 1vw #ffffff;
	text-decoration: none;
	color:rgb(255, 255, 255);
	margin-left: calc(var(--index) * 19);
	margin-top: calc(var(--index) * 0.7);
}
.indexhtml{
	text-shadow: 0 0 1vw #ffffff;
	text-decoration: none;
	color:rgb(255, 255, 255);
	margin-left: calc(var(--index) * 32);
	margin-top: calc(var(--index) * 0.7);
}
.reservhtml{
	text-shadow: 0 0 1vw #ffffff;
	text-decoration: none;
	color:rgb(255, 255, 255);
	margin-left: calc(var(--index) * 42);
	margin-top: calc(var(--index) * 0.7);
}
.orderhtml{
	text-shadow: 0 0 1vw #ffffff;
	text-decoration: none;
	color:rgb(255, 255, 255);
	margin-left: calc(var(--index) * 53);
	margin-top: calc(var(--index) * 0.7);
}
.deliveryhtml{
	text-shadow: 0 0 1vw #ffffff;
	text-decoration: none;
	color:rgb(255, 255, 255);
	margin-left: calc(var(--index) * 47);
	margin-top: calc(var(--index) * 0.7);
}
.autohtml{
	text-shadow: 0 0 1vw #ffffff;
	text-decoration: none;
	color:rgb(255, 255, 255);
	margin-left: calc(var(--index) * 60);
	margin-top: calc(var(--index) * 0.7);
}
.main-article {
	--main-article-transform: translate3d(0, calc(var(--scrollTop) / -7.5), 0);
	min-height: 250vh;
	background-size: cover;
	color: var(--text);
	display: flex;
	position: relative;
	/* Update: */
	top: -1px;
	z-index: 10;
}
</style>

</script>
    <script src="../js/calendar1.js"></script>
    <script src="../js/calendar2.js"></script> 
    <link rel="stylesheet" href="../css/calendar.css">
    <style type="text/css">
        input {
			width: 8vw; 
			text-align: center;
		}
    </style> 
    <script type="text/javascript">
        $(function() {
        $('#datep').datepicker();
		});
</script>
