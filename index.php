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
        $query = $connect->query ("INSERT INTO site.reservation (date,time,guestcount,name,phonenumber,email,status) 
		VALUES ('$date','$time','$guestcount','$name','$phonenumber','$email','$status')");
        }
		// для передачи обратной связи 
	else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$connect = new PDO("mysql:host=localhost; dbname=site;", 'root','root');
		if (isset($_POST['name'])) { //isset for name
			$name = $_POST['name'];
			$contacts = $_POST['contacts'];
			$comments = $_POST['comments'];
			$query = $connect->query ("INSERT INTO site.comments (name,contacts,comments) VALUES ('$name','$contacts','$comments')");
			}
		// Перенаправление на текущую страницу
		header("Location: {$_SERVER['REQUEST_URI']}");
		exit;
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

	<link rel="stylesheet" href="css/main.css">

	<script src="js/gsap.min.js" defer></script>
	<script src="js/ScrollTrigger.min.js" defer></script>
	<script src="js/ScrollSmoother.min.js" defer></script>

	<script src="js/app.js" defer></script>

</head>

<body>
	<div class="wrapper">
		<div class="scroll" style="background-image: url(img/work/up.png);">
			<a class="caption reservhtml" href="reserv.php">Забронировать</a>
			<a class="caption indexhtml" href="index.php">Главная</a>
			<a class="caption contactshtml" href="contacts.php">Контакты</a>
			<a class="caption menuhtml" href="menu.php">Меню<a>
			<a class="caption galleryhtml" href="gallery.php">Галерея<a></a>
			<a class="caption deliveryhtml" href="delivery.php">Доставка<a></a>
			<a class="caption autohtml" href="autorize.php">Войти</a>
		</div>
		<div class="content">
			<header class="main-header">
				<div class="layers">
					<div class="layer__header">
						<div class="layers__title">Найтхорм</div>
						<div class="layers__caption">высокая кухня</div>
					</div>
					<div class="layer layers__base" style="background-image: url(img/layer-base.png);"></div>
					<div class="layer layers__middle" style="background-image: url(img/layer-middle.png);"></div>
					<div class="layer layers__front" style="background-image: url(img/layer-front.png);">
					</div>
				</div>
			</header>
			<article class="main-article">
				<a class="title dungeon_text1"> Изысканное меню и не только... </a>
				<a class="caption dungeon_text2"> Команда профессиональных поваров отвечает за качество и 
						подачу блюд в нашем ресторане. Если вам очень понравилось 
						или есть комментарий, то официант с радостью
						передаст ваши слова поварам. </a>
				<a class="captionmini dungeon_text3">- Лучший ресторан по версии tripadvisor.ru</a>
				<img class="photo_1" src="img/work/csm_whs_highlight_see_holzbraun_white.png">
				<img class="photo_2" src="img/work/csm_whs_highlight_natur_holzbraun_white.png">
				<div class="photo_dungeontext1">
					<main class="gallery">
						<div data-speed=".9" class="gallery__right">
							<img class="gallery__item" src="img/work/1.png" alt="Alt">
						</div>
					</main>
				</div>
				<div class="photo_dungeontext2">
					<main class="gallery">
						<div data-speed=".9" class="gallery__left">
							<img class="gallery__item" src="img/work/womaneating.jpg" alt="Alt">
						</div>
					</main>
				</div>
				<a class="title dungeon_text4"> Вкусная еда приедет к вам домой. </a>
				<a class="caption dungeon_text5"> Если захочется поесть в домашней обстановке, 
					то вы всегда можете оформить доставку изысканных блюд. </a>
			
				<img class="photo_dungeontext3" src="img/work/marrakesh_restaurant.jpg" alt="Alt">
				<a class="special dungeon_text6"> Пусть Ваш обед будет незабываемым.<br> 
					Скидка 25% на всё меню кухни в честь дня рождения. </a>

				<div id="myBtn" class="box-3">
					<div class="btn btn-three">
						<span>Забронировать стол</span>
					</div>
				</div>

				<div id="myModal" class="modal">
					<div class="modal-content">
						<div class="modal-header">
							<span class="close">&times;</span>
								<div class="bron"><h2><center>Забронировать столик</center></h2></div>
						</div>
						<div class="modal-body"> 
							<form action="" method="POST" name="Form" onsubmit="return validateForm()"> 
								<div class="ui-widget">
									<input name="date" class="a1" placeholder="дата резервации" id="datep" required />
								</div>
								<input type="time" class="a2" name="time" placeholder="время резервации" required><br>
								<input type="text" class="a3" name="guestcount" placeholder="число гостей" required><br>
								<input type="text" class="a4" name="name" placeholder="имя" required><br>
								<input type="text" class="a5" name="phonenumber" placeholder="номер телефона" required><br>
								<input type="text" class="a6" name="email" placeholder="почта" required><br>
								<center><input class="a8" type="submit"></center>
							</form>
						</div>
						<div class="modal-footer">
						
						</div>
					</div>
				</div>

				<a class="captionmini dungeon_text7"> Вы можете обратиться по телефону
					<b>+7(951)298-49-41</b> </a>
				<a class="title dungeon_text8"> Приятная обстановка </a>
				<a class="caption dungeon_text9"> Красивый вид из окна, большое количество
					живых растений, спокойная музыка и мягкая мебель <br>
					- это всё про "Найтхорм". </a>
		
				<div class="photo_dungeontext4">
					<main class="gallery">
						<div data-speed=".9" class="gallery__right">
							<img class="gallery__item" src="img/work/rest1.jpg" alt="Alt">
						</div>
					</main>
				</div>

				<div class="photo_dungeontext5">
					<main class="gallery">
						<div data-speed=".9" class="gallery__right">
							<img class="gallery__item" src="img/work/rest2.jpg" alt="Alt">
						</div>
					</main>
				</div>

				<div class="photo_dungeontext6">
					<main class="gallery">
						<div data-speed=".9" class="gallery__right">
							<img class="gallery__item" src="img/work/rest3.jpg" alt="Alt">
						</div>
					</main>
				</div>

				<div class="photo_dungeontext7">
					<main class="gallery">
						<div data-speed=".9" class="gallery__left">
							<img class="gallery__item" src="img/work/rest4.jpg" alt="Alt">
						</div>
					</main>
				</div>

				<div class="photo_dungeontext8">
					<main class="gallery">
						<div data-speed=".9" class="gallery__right">
							<img class="gallery__item" src="img/work/rest5.jpg" alt="Alt">
						</div>
					</main>
				</div>

				<div class="photo_dungeontext9">
					<main class="gallery">
						<div data-speed=".9" class="gallery__right">
							<img class="gallery__item" src="img/work/rest6.jpg" alt="Alt">
						</div>
					</main>
				</div>
				
				<img class="photo_3" src="img/work/logowhite.png">

				<a class="big dungeon_text10"> Найтхорм </a>

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
				<a class="captionmi ni dungeon_text19">Выходные и праздничные дни<br>
												с 10:00 - 22:00</a>
				<a class="title dungeon_text15">Есть предложения или жалобы?</a>
				<a class="caption dungeon_text16">Вы всегда можете к нам обратиться.</a>
				
				<form action="" method="POST" class="formes" name="Form" onsubmit="return validateForm()">
					
					<input class="place1" type="text" name="name" placeholder="Имя"required></input>
					<input class="place2" type="text" name="contacts" placeholder="Почта или телефон"required></input>
					<textarea class="place3" type="text" name="comments" placeholder="Пожелания или вопрос"required></textarea>
					<center><input class="button1" type="submit"></center>
				</form>
				<img class="photo_6" src="img/work/free-icon-reindeer-2445186 white.png">
				<img class="photo_7" src="img/work/free-icon-deer-1063417 white.png">
			</article>
		</div>
	</div>

</body>
</html>
<!-- для текста -->
<style>
.main-article {
	--main-article-transform: translate3d(0, calc(var(--scrollTop) / -7.5), 0);
	min-height: 490vh;
	background-size: cover;
	color: var(--text);
	display: flex;
	position: relative;
	/* Update: */
	top: -1px;
	z-index: 10;
}
.title{
	font-size: calc(var(--index) * 1.15);
	position: absolute;
  	color: #b6b6b6; /* Цвет обычной ссылки */
}
.special{
	font-size: calc(var(--index) * 0.9);
	position: absolute;
  	color: #b6b6b6; /* Цвет обычной ссылки */
}
.caption{
	font-size: calc(var(--index) * 0.75);
	position: absolute;
  	color: #b6b6b6; /* Цвет обычной ссылки */
}
.captionmini{
	font-size: calc(var(--index) * 0.6);
	position: absolute;
  	color: #b6b6b6; /* Цвет обычной ссылки */
}
.big{
	font-size: calc(var(--index) * 2.2);
	position: absolute;
  	color: #b6b6b6; /* Цвет обычной ссылки */
}
.dungeon_text1{
	/* Изысканное меню и не только... */
	margin-top: calc(var(--index) * 4.3);
  	margin-left: calc(var(--index) * 8.2);
}
.dungeon_text2{
	/* Команда профессиональных поваров отвечает за качество и 
						подачу блюд в нашем ресторане. Если вам очень понравилось блюдо 
						или у вас есть комментарий, то официант с радостью 
						передаст ваши слова поварам. */
	margin-top: calc(var(--index) * 6.3);
  	margin-left: calc(var(--index) * 8.2);
	margin-right: calc(var(--index) * 30);
}
.dungeon_text3{
	/* - Лучший ресторан по версии tripadvisor.ru */
	margin-top: calc(var(--index) * 11);
  	margin-left: calc(var(--index) * 8);
	margin-right: calc(var(--index) * 33);
}
.dungeon_text4{
	/* Вкусная еда приедет к вам домой. */
	margin-top: calc(var(--index) * 26);
  	margin-left: calc(var(--index) * 36);
	margin-right: calc(var(--index) * 8);
}
.dungeon_text5{
	/* Если захочется поесть в домашней обстановке, 
					то вы всегда можете оформить доставку изысканных блюд. */
	margin-top: calc(var(--index) * 29.7);
  	margin-left: calc(var(--index) * 35);
	margin-right: calc(var(--index) * 9.2);
	text-align: right;
}
.dungeon_text6{
	/* Пусть Ваш обед будет незабываемым.<br> 
					Скидка 25% на всё меню кухни в честь дня рождения. */
	margin-top: calc(var(--index) * 44);
  	margin-left: calc(var(--index) * 33);
	text-align: center;
}
.dungeon_text7{
	/* Вы можете обратиться по телефону
					<b>+7(951)298-49-41 */
	margin-top: calc(var(--index) * 55);
  	margin-left: calc(var(--index) * 37);
	text-align: center;
}
.dungeon_text8{
	/* Приятная обстановка */
	margin-top: calc(var(--index) * 60);
  	margin-left: calc(var(--index) * 8);
	text-align: center;
}
.dungeon_text9{
	/* Красивый вид из окна, большое количество
					живых растений, спокойная музыка и мягкая мебель
					- это всё про "Найтхорм". */
	margin-top: calc(var(--index) * 61.7);
  	margin-left: calc(var(--index) * 8);
	text-align: left;
}
.dungeon_text10{
	/* Найтхорм */
	margin-top: calc(var(--index) * 124);
  	margin-left: calc(var(--index) * 11);
	text-align: left;
}
.dungeon_text11{
	/* Контакты */
	margin-top: calc(var(--index) * 90);
  	margin-left: calc(var(--index) * 38.5);
	text-align: left;
}
.dungeon_text12{
	/* Адрес и телефон */
	margin-top: calc(var(--index) * 95);
  	margin-left: calc(var(--index) * 29);
	text-align: left;
}
.dungeon_text13{
	/* Москва, улица 1905 года, д. 10, стр. 1 */
	margin-top: calc(var(--index) * 98);
  	margin-left: calc(var(--index) * 29);
	text-align: left;
}
.dungeon_text14{
	/* По всем вопросам <br>
	+7(951)298 49-41<br>
	WhatsApp: +7(951)298 49-41<br>
	Email: vip@nighthorm.ru
	Вконтакте: "Найтхорм" */
	margin-top: calc(var(--index) * 101);
  	margin-left: calc(var(--index) * 29);
	text-align: left;
}
.dungeon_text15{
	/* Есть предложения или жалобы? */
	margin-top: calc(var(--index) * 136);
	text-align: center;
	margin-left: calc(var(--index) * 23);
}
.dungeon_text16{
	/* Вы всегда можете к нам обратиться. */
	margin-top: calc(var(--index) * 138);
	text-align: center;
	margin-left: calc(var(--index) * 25.5);
}
.dungeon_text17{
	/* Время работы */
	margin-top: calc(var(--index) * 95);
  	margin-left: calc(var(--index) * 48);
	text-align: right;
}
.dungeon_text18{
	/* Будни */
	margin-top: calc(var(--index) * 98);
  	margin-left: calc(var(--index) * 49.5);
	text-align: right;
}
.dungeon_text19{
	/* Выходные и праздничные дни */
	margin-top: calc(var(--index) * 101);
  	margin-left: calc(var(--index) * 44);
	text-align: right;
}
</style>

<!-- для фотографий c эффектами -->
<style>
.photo_dungeontext1{
	margin-top: calc(var(--index) * 4.3);
	margin-left: calc(var(--index) * 41.2);
	width: 25vw;
  	height: 25vw;
	position: absolute;
}
.photo_dungeontext2{
	margin-top: calc(var(--index) * 20);
	margin-left: calc(var(--index) * 9);
	width: 33vw;
  	height: 40vw;
	position: absolute;
}
.photo_dungeontext3{
	margin-top: calc(var(--index) * 40);
	width: 100vw;
  	height: 24vw;
	position: absolute;
}
.photo_dungeontext4{
	margin-top: calc(var(--index) * 68);
	margin-left: calc(var(--index) * 8);
	width: 20vw;
  	height: 50vw;
	position: absolute;
}
.photo_dungeontext5{
	margin-top: calc(var(--index) * 68);
	margin-left: calc(var(--index) * 26);
	width: 20vw;
  	height: 50vw;
	position: absolute;
}
.photo_dungeontext6{
	margin-top: calc(var(--index) * 68);
	margin-left: calc(var(--index) * 44);
	width: 20vw;
  	height: 50vw;
	position: absolute;
}
.photo_dungeontext7{
	margin-top: calc(var(--index) * 90);
	margin-left: calc(var(--index) * 8);
	width: 20vw;
  	height: 50vw;
	position: absolute;
}
.photo_dungeontext8{
	margin-top: calc(var(--index) * 112);
	margin-left: calc(var(--index) * 26);
	width: 20vw;
  	height: 50vw;
	position: absolute;
}
.photo_dungeontext9{
	margin-top: calc(var(--index) * 112);
	margin-left: calc(var(--index) * 44);
	width: 20vw;
  	height: 50vw;
	position: absolute;
}
</style>
<!-- для фотографий без эффектов -->
<style>
.photo_1{
	margin-top: calc(var(--index) * 14.3);
	margin-left: calc(var(--index) * 14.6);
	width: 3vw;
  	height: 3vw;
}
.photo_2{
	margin-top: calc(var(--index) * 14.3);
	margin-left: calc(var(--index) * 9.6);
	width: 3vw;
  	height: 3vw;
}
.photo_3{
	margin-top: calc(var(--index) * 112);
	margin-left: calc(var(--index) * 7.8);
	width: 23vw;
  	height: 17vw;
	position: absolute;
}
.photo_4{
	margin-top: calc(var(--index) * 91);
	margin-left: calc(var(--index) * 29);
	width: 10vw;
  	height: 0.03vw;
	position: absolute;
}
.photo_5{
	margin-top: calc(var(--index) * 91);
	margin-left: calc(var(--index) * 47);
	width: 10vw;
  	height: 0.03vw;
	position: absolute;
}
.photo_6{
	margin-top: calc(var(--index) * 143);
	margin-left: calc(var(--index) * 11);
	width: 10vw;
  	height: 10vw;
	position: absolute;
	opacity: 0.5;
}
.photo_7{
	margin-top: calc(var(--index) * 148.8);
	margin-left: calc(var(--index) * 47);
	width: 10vw;
  	height: 10vw;
	position: absolute;
	opacity: 0.5;
}
</style>

<!-- для кнопки заказать -->
<style>

div[class*=box] {
	margin-top: calc(var(--index) * 48);
	margin-left: calc(var(--index) * 13);
  	height: 33.33%;
  	width: 30%; 
  	display: flex;
  	justify-content: center;
  	align-items: center;
}

.btn {
	font-size: 1.15vw;
	line-height: 3.3vw;
	height: 3vw;
	text-align: center;
	width: 15vw;
	cursor: pointer;
}

.btn-three {
	color: #FFF;
	transition: all 0.5s;
	position: relative;
}
.btn-three::before {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	z-index: 1;
	background-color: rgba(255,255,255,0.25);
	transition: all 0.3s;
}
.btn-three:hover::before {
	opacity: 0 ;
	transform: scale(0.5,0.5);
}
.btn-three::after {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	z-index: 1;
	opacity: 0;
	transition: all 0.3s;
	border: 0.15vw solid rgba(255,255,255,0.5);
	transform: scale(1.2,1.2);
}
.btn-three:hover::after {
	opacity: 1;
	transform: scale(1,1);
}

/* для формы бронирования */

form{
	width: 20vw;
	height: 30vw;
	position: absolute;
	margin-left: calc(var(--index) * 4.7);
}
/* для обратной связи */
.formes{
	margin-left: calc(var(--index) * 25.5);
}
.place1{
	margin-top: calc(var(--index) * 144);
	width: 22vw;
	height: 3vw;
	position: absolute;
	font-size: 1vw;
}
.place2{
	margin-top: calc(var(--index) * 147);
	width: 22vw;
	height: 3vw;
	position: absolute;
	font-size: 1vw;
}
.place3{
	margin-top: calc(var(--index) * 150);
	width: 22vw;
	height: 8vw;
	position: absolute;
	font-size: 1.1vw;
}
.button1{
	margin-top: calc(var(--index) * 157);
	width: 10vw;
	height: 3vw;
	color: #ffffff;
	background-color: #92000000;
	justify-content: center;
	text-align: center;
	font-size: 1.1vw;
	margin-left: calc(var(--index) * 1);
	border-width: 0.01vw;
	border-color: #ffffff;
}

/* для формы */

#myBtn {
        }

    .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 110vw; /* Location of the box */
            margin-left: calc(var(--index) * 14);
            top: 0;
            width: 60%; /* Full width */
            height: 100%; /* Full height */
            background-color: rgba(255, 0, 0, 0); /* Fallback color */
            background-color: rgba(0, 0, 0, 0); /* Black w/ opacity */
        }

        .modal-content {
            position: relative;
            background-color: rgb(0, 0, 0);
            margin: auto;
            padding: 0;
            border: 5px solid rgb(255, 255, 255);
            width: 50%;
            box-shadow: 0 4px 8px 0 rgb(255, 255, 255),0 6px 20px 0 rgba(0,0,0,0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s;
        }


        @-webkit-keyframes animatetop {
            from {top:-300px; opacity:0} 
            to {top:0; opacity:1}
        }

        @keyframes animatetop { 
            from {top:-300px; opacity:0}
            to {top:0; opacity:1}
        }


        .close { /*крестик при бездействии*/
            color: white;
            float: right;
            font-size: 2vw;
            font-weight: bold;
			margin-left: calc(var(--index) * 29);
        }

		.bron{
			position: absolute;
			margin-left: calc(var(--index) * 3.4);
			margin-top: calc(var(--index) * 1);
			font-size: 1vw;
		}

        .close:hover,
        .close:focus { /*крестик при нажатии*/
            color: #373c56;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-header { /*шапка*/
            background-color: rgb(22, 22, 22);
            color: white;
			height: 4vw;
        }

        .modal-body {
			padding: 12vw 0px;
		} /*тело*/

        .modal-footer { /*подвал*/
            padding: 2vw 16px;
            background-color: rgb(9, 9, 9);
            color: white;
        }
.a1{
	font-size: 1vw;
 	position: absolute;
	margin-top: calc(var(--index) * -7);
	width: 15vw;
	height: 2vw;
}
.a2{
	font-size: 1vw;
 	position: absolute;
	margin-top: calc(var(--index) * -4.5);
	width: 15vw;
	height: 2vw;
}
.a3{
	font-size: 1vw;
 	position: absolute;
	margin-top: calc(var(--index) * -3);
	width: 15vw;
	height: 2vw;
}
.a4{
	font-size: 1vw;
 	position: absolute;
	margin-top: calc(var(--index) * -1.5);
	width: 15vw;
	height: 2vw;
}
.a5{
	font-size: 1vw;
 	position: absolute;
	margin-top: calc(var(--index) * 0);
	width: 15vw;
	height: 2vw;
}
.a6{
	font-size: 1vw;
 	position: absolute;
	margin-top: calc(var(--index) * 1.5);
	width: 15vw;
	height: 2vw;
}
.a7{
 	position: absolute;
	margin-top: calc(var(--index) * 6.25);
	width: 10vw;
	height: 2vw;
}
.a8{
 	position: absolute;
	margin-top: calc(var(--index) * 3);
	margin-left: calc(var(--index) * -4.2);
	color: #ffffff;
	background-color: #000000;
	justify-content: center;
	text-align: center;
	font-size: 1vw;
	border-width: 0.01vw;
	border-color: #ffffff;
}
/* для панели переключения между страницами */
.up{
	margin-top: 0;
	width: 100vw;
	height: 4.5vw;
	opacity: 0.7;
	position: absolute;
	z-index: 10;
}
.scroll{
	z-index: 99;
	width: 100vw;
	height: 4vw;
	position: absolute;
	opacity: 0.6;
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