<!-- для передачи обратной связи -->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connect = new PDO("mysql:host=localhost; dbname=site;", 'root','root');
    if (isset($_POST['name'])) { //isset for date
        $name = $_POST['name'];
        $contacts = $_POST['contacts'];
        $comments = $_POST['comments'];
        $query = $connect->query ("INSERT INTO site.comments (name,contacts,comments) VALUES ('$name','$contacts','$comments')");
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

	<title>Контакты</title>

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
				<img class="forest" src="img/background/paola-mier-7tJ6Y5bw7FA-unsplash (1) forest.png">
				<img class="river" src="img/background/paola-mier-7tJ6Y5bw7FA-unsplash (1).png">
                <img class="up" src="img/background/up.png">
                <img class="photo_3" src="img/work/logowhite.png">

				<a class="big dungeon_text10"> Найтхорм </a>
                <a class="caption dungeon_text1">Контакты</a>

				<img class="photo_4" src="img/work/botoom.jpg">
				<a class="title dungeon_text11"> Контакты </a>
				<img class="photo_5" src="img/work/botoom.jpg">

				<a class="caption dungeon_text12"> <b>Адрес и телефон</b></a>
				<a class="captionmini dungeon_text13">Москва, улица 1905 года, д. 10, стр. 1</a>
				<a class="captionmini dungeon_text14">По всем вопросам <br>
													+7(951)298 49-41<br>
													WhatsApp: +7(951)298 49-41<br>
													Email: vip@nighthorm.ru<br>
													Вконтакте: "Найтхорм"</a>
				<a class="caption dungeon_text17"><b>Время работы</b></a>
				<a class="captionmini dungeon_text18">Будни<br>
													c 10:00 - 22:00</a>
				<a class="captionmini dungeon_text19">Выходные и праздничные дни<br>
												с 10:00 - 22:00</a>
				<a class="title dungeon_text15">Есть предложения или жалобы?</a>
				<a class="caption dungeon_text16">Вы всегда можете к нам обратиться.</a>
				
				<form action="" method="POST" class="formes" name="Form" onsubmit="return validateForm()">
					
					<input class="place1" type="text" name="name" placeholder="Имя"required></input>
					<input class="place2" type="text" name="contacts" placeholder="Почта или телефон"required></input>
					<textarea class="place3" type="text" name="comments" placeholder="Пожелания или вопрос"required></textarea>
					<center><input class="button1" type="submit"></center>
				</form>
				<img class="photo_6" src="img/work/free-icon-reindeer-2445186.png">
				<img class="photo_7" src="img/work/free-icon-deer-1063417.png">
                <img class="photo_1" src="img/work/free-icon-fish-1833941.png">
                <img class="photo_2" src="img/work/free-icon-fish-7105162.png">
			</article>
		</div>
	</div>

</body>
</html>
<!-- для текста -->
<style>
.title{
	font-size: calc(var(--index) * 1.15);
	position: absolute;
  	color: #000000; /* Цвет обычной ссылки */
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
.big{
	font-size: calc(var(--index) * 2.2);
	position: absolute;
  	color: #ffffff; /* Цвет обычной ссылки */
}
.dungeon_text1{
    /* Контакты под названием Найтхорм */
    color: #ffffff;
    margin-top: calc(var(--index) * 11.4);
  	margin-left: calc(var(--index) * 31.8);
}
.dungeon_text10{
	/* Найтхорм */
    color: #ffffff;
	margin-top: calc(var(--index) * 8.3);
  	margin-left: calc(var(--index) * 27.6);
	text-align: left;
}
.dungeon_text11{
	/* Контакты */
	margin-top: calc(var(--index) * 17);
  	margin-left: calc(var(--index) * 30.8);
	text-align: left;
}
.dungeon_text12{
	/* Адрес и телефон */
	margin-top: calc(var(--index) * 22);
  	margin-left: calc(var(--index) * 19);
	text-align: left;
}
.dungeon_text13{
	/* Москва, улица 1905 года, д. 10, стр. 1 */
	margin-top: calc(var(--index) * 25);
  	margin-left: calc(var(--index) * 19);
	text-align: left;
}
.dungeon_text14{
	/* По всем вопросам <br>
	+7(951)298 49-41<br>
	WhatsApp: +7(951)298 49-41<br>
	Email: vip@nighthorm.ru
	Вконтакте: "Найтхорм" */
	margin-top: calc(var(--index) * 28);
  	margin-left: calc(var(--index) * 19);
	text-align: left;
}
.dungeon_text15{
	/* Есть предложения или жалобы? */
	margin-top: calc(var(--index) * 39);
	text-align: center;
	margin-left: calc(var(--index) * 24);
}
.dungeon_text16{
	/* Вы всегда можете к нам обратиться. */
	margin-top: calc(var(--index) * 41);
	text-align: center;
	margin-left: calc(var(--index) * 26.5);
}
.dungeon_text17{
	/* Время работы */
	margin-top: calc(var(--index) * 22);
  	margin-left: calc(var(--index) * 42.8);
	text-align: right;
}
.dungeon_text18{
	/* Будни */
	margin-top: calc(var(--index) * 25);
  	margin-left: calc(var(--index) * 44.5);
	text-align: right;
}
.dungeon_text19{
	/* Выходные и праздничные дни */
	margin-top: calc(var(--index) * 28);
  	margin-left: calc(var(--index) * 39);
	text-align: right;
}
</style>

<!-- для фотографий без эффектов -->
<style>
.photo_1{
	margin-top: calc(var(--index) * 40);
	margin-left: calc(var(--index) * 7);
	width: 10vw;
  	height: 10vw;
	position: absolute;
    opacity: 0.6;
}
.photo_2{
	margin-top: calc(var(--index) * 53);
	margin-left: calc(var(--index) * 53);
	width: 10vw;
  	height: 10vw;
	position: absolute;
    opacity: 0.6;
}
.photo_3{
	margin-top: calc(var(--index) * 1);
	margin-left: calc(var(--index) * 28);
	width: 15vw;
  	height: 11vw;
	position: absolute;
    z-index: 99;
}
.photo_4{
	margin-top: calc(var(--index) * 18);
	margin-left: calc(var(--index) * 19);
	width: 13vw;
  	height: 0.03vw;
	position: absolute;
}
.photo_5{
	margin-top: calc(var(--index) * 18);
	margin-left: calc(var(--index) * 40);
	width: 13vw;
  	height: 0.03vw;
	position: absolute;
}
.photo_6{
	margin-top: calc(var(--index) * 19);
	margin-left: calc(var(--index) * 7);
	width: 10vw;
  	height: 10vw;
	position: absolute;
	opacity: 0.5;
}
.photo_7{
	margin-top: calc(var(--index) * 25.8);
	margin-left: calc(var(--index) * 52);
	width: 10vw;
  	height: 10vw;
	position: absolute;
	opacity: 0.5;
}
</style>

<!-- для кнопки заказать -->
<style>

/* для обратной связи */
.formes{
	margin-left: calc(var(--index) * 26.5);
    z-index: 99;
}
.place1{
	margin-top: calc(var(--index) * 44);
	width: 22vw;
	height: 3vw;
	position: absolute;
	font-size: 1vw;
}
.place2{
	margin-top: calc(var(--index) * 47);
	width: 22vw;
	height: 3vw;
	position: absolute;
	font-size: 1vw;
}
.place3{
	margin-top: calc(var(--index) * 50);
	width: 22vw;
	height: 8vw;
	position: absolute;
	font-size: 1.1vw;
}
.button1{
	margin-top: calc(var(--index) * 57);
	width: 10vw;
	height: 3vw;
	color: #ffffff;
	background-color: #0000003e;
	justify-content: center;
	text-align: center;
	font-size: 1.1vw;
	margin-left: calc(var(--index) * 4.2);
	border-width: 0.01vw;
	border-color: #ffffff;
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
	min-height: 190vh;
	background-size: cover;
	color: var(--text);
	display: flex;
	position: relative;
	/* Update: */
	top: -1px;
	z-index: 10;
}
.forest{
    z-index: 0;
    width: 100vw;
    height: 100vh;
    position: absolute;
}
.river{
    z-index: 0;
    width: 100vw;
    height: 100vh;
    margin-top: 100vh;
    position: absolute;
}
</style>
