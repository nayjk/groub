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
        $status = "ожидает подтверждения";
        $query = $connect->query ("INSERT INTO site.reservation (date,time,guestcount,name,phonenumber,email,status) VALUES ('$date','$time','$guestcount','$name','$phonenumber','$email','$status')");
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

	<title>Бронирование</title>

	<link rel="stylesheet" href="css/main.css">

	<script src="js/gsap.min.js" defer></script>
	<script src="js/ScrollTrigger.min.js" defer></script>
	<script src="js/ScrollSmoother.min.js" defer></script>

	<script src="js/app.js" defer></script>

</head>
<body>
	<div class="wrapper">
		<div class="scroll">
			<a class="caption reservhtml" href="reserv.php">Забронировать</a>
			<a class="caption indexhtml" href="index.php">Главная</a>
			<a class="caption contactshtml" href="contacts.php">Контакты</a>
			<a class="caption menuhtml" href="menu.php">Меню<a>
			<a class="caption galleryhtml" href="gallery.php">Галерея<a></a>
			<a class="caption deliveryhtml" href="delivery.php">Доставка<a></a>
			<a class="caption autohtml" href="autorize.php">Войти</a>
		</div>
		<div class="content">
			<article class="main-article">
                <img class="up" src="img/background/up.png">
                <img class="backgroundforest" src="img/background/forests.png">
                <img class="photo_3" src="img/work/logowhite.png">

				<a class="big dungeon_text10"> Найтхорм </a>
                <a class="caption dungeon_text1">Бронирование</a>

				<a class="obiknoveni dungeon_text2">Форма брони</a>

				<form action="" method="POST" class="formes" name="Form" onsubmit="return validateForm()"> 
					<div class="ui-widget">
						<input name="date" class="place1" placeholder="дата резервации" id="datep" required />
					</div>
					<input type="time" class="place2" name="time" placeholder="время резервации" required><br>
					<input type="text" class="place3" name="guestcount" placeholder="число гостей" required><br>
					<input type="text" class="place4" name="name" placeholder="имя" required><br>
					<input type="text" class="place5" name="phonenumber" placeholder="номер телефона" required><br>
					<input type="email" class="place6" name="email" placeholder="почта" required><br>
					<center><input class="button1" type="submit"></center>		
				</form>

				<img class="photo_6" src="img/work/free-icon-reindeer-2445186.png">
				<img class="photo_7" src="img/work/free-icon-deer-1063417.png">
			</article>
		</div>
	</div>

</body>
</html>
<!-- для текста -->
<style>
.big{
	font-size: calc(var(--index) * 2.2);
	position: absolute;
  	color: #ffffff; /* Цвет обычной ссылки */
}
.obiknoveni{
	font-size: calc(var(--index) * 1.3);
	position: absolute;
}
.caption{
	font-size: calc(var(--index) * 0.75);
	position: absolute;
  	color: #000000; /* Цвет обычной ссылки */
}
.captionmini{
	font-size: calc(var(--index) * 0.6);
	position: absolute;
  	color: #000000; /* Цвет обычной ссылки */
}
.dungeon_text1{
    /* Забронировать под названием Найтхорм */
    color: #ffffff;
    margin-top: calc(var(--index) * 11.4);
  	margin-left: calc(var(--index) * 30.4);
}
.dungeon_text2{
    /* Форма брони*/
    color: #000000;
    margin-top: calc(var(--index) * 14.4);
  	margin-left: calc(var(--index) * 29);
	text-align: center;
}
.dungeon_text10{
	/* Найтхорм */
    color: #ffffff;
	margin-top: calc(var(--index) * 8.3);
  	margin-left: calc(var(--index) * 27.6);
	text-align: left;
	z-index: 8;
}
</style>

<!-- для фотографий без эффектов -->
<style>
.photo_3{
	margin-top: calc(var(--index) * 1);
	margin-left: calc(var(--index) * 28);
	width: 15vw;
  	height: 11vw;
	position: absolute;
    z-index: 99;
}
.photo_6{
	margin-top: calc(var(--index) * 20);
	margin-left: calc(var(--index) * 7);
	width: 10vw;
  	height: 10vw;
	position: absolute;
	opacity: 0.5;
}
.photo_7{
	margin-top: calc(var(--index) * 29.8);
	margin-left: calc(var(--index) * 52);
	width: 10vw;
  	height: 10vw;
	position: absolute;
	opacity: 0.5;
}
.backgroundforest{
	position: absolute;
	width: 100vw;
}
</style>

<style>

/* для обратной связи */
.formes{
	margin-left: calc(var(--index) * 26.5);
    z-index: 99;
	position: absolute;
}
.place1{
	margin-top: calc(var(--index) * 18);
	width: 22vw;
	height: 3vw;
	position: absolute;
	font-size: 1vw;
}
.place2{
	margin-top: calc(var(--index) * 21);
	width: 22vw;
	height: 3vw;
	position: absolute;
	font-size: 1vw;
}
.place3{
	margin-top: calc(var(--index) * 23);
	width: 22vw;
	height: 3vw;
	position: absolute;
	font-size: 1.1vw;
}
.place4{
	margin-top: calc(var(--index) * 25);
	width: 22vw;
	height: 3vw;
	position: absolute;
	font-size: 1.1vw;
}
.place5{
	margin-top: calc(var(--index) * 27);
	width: 22vw;
	height: 3vw;
	position: absolute;
	font-size: 1.1vw;
}
.place6{
	margin-top: calc(var(--index) * 29);
	width: 22vw;
	height: 3vw;
	position: absolute;
	font-size: 1.1vw;
}
.button1{
	margin-top: calc(var(--index) * 32);
	width: 10vw;
	height: 3vw;
	color: black;
	background-color: #0000003e;
	justify-content: center;
	text-align: center;
	font-size: 1.1vw;
	margin-left: calc(var(--index) * 4.2);
	border-width: 0.01vw;
	border-color: black;
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
.reservhtml{
	text-shadow: 0 0 1vw #ffffff;
	text-decoration: none;
	color:rgb(255, 255, 255);
	margin-left: calc(var(--index) * 3);
	margin-top: calc(var(--index) * 0.7);
}
.indexhtml{
	text-shadow: 0 0 1vw #ffffff;
	text-decoration: none;
	color:rgb(255, 255, 255);
	margin-left: calc(var(--index) * 12);
	margin-top: calc(var(--index) * 0.7);
}
.contactshtml{
	text-shadow: 0 0 1vw #ffffff;
	text-decoration: none;
	color:rgb(255, 255, 255);
	margin-left: calc(var(--index) * 19);
	margin-top: calc(var(--index) * 0.7);
}
.menuhtml{
	text-shadow: 0 0 1vw #ffffff;
	text-decoration: none;
	color:rgb(255, 255, 255);
	margin-left: calc(var(--index) * 27);
	margin-top: calc(var(--index) * 0.7);
}
.galleryhtml{
	text-shadow: 0 0 1vw #ffffff;
	text-decoration: none;
	color:rgb(255, 255, 255);
	margin-left: calc(var(--index) * 39);
	margin-top: calc(var(--index) * 0.7);
}
.deliveryhtml{
	text-shadow: 0 0 1vw #ffffff;
	text-decoration: none;
	color:rgb(255, 255, 255);
	margin-left: calc(var(--index) * 46);
	margin-top: calc(var(--index) * 0.7);
}
.autohtml{
	text-shadow: 0 0 1vw #ffffff;
	text-decoration: none;
	color:rgb(255, 255, 255);
	margin-left: calc(var(--index) * 54);
	margin-top: calc(var(--index) * 0.7);
}
.main-article {
	--main-article-transform: translate3d(0, calc(var(--scrollTop) / -7.5), 0);
	min-height: 125vh;
	background-size: cover;
    background-color: white;
	color: var(--text);
	display: flex;
	position: relative;
	/* Update: */
	top: -1px;
	z-index: 10;
}
</style>
<script>
    var modal = document.getElementById('myModal');
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</script>
    <script src="js/calendar1.js"></script>
    <script src="js/calendar2.js"></script> 
    <link rel="stylesheet" href="css/calendar.css">
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