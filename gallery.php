<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Галерея</title>

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
                <img class="photo_3" src="img/work/logowhite.png">

				<a class="big dungeon_text10"> Найтхорм </a>
				<a class="caption dungeon_text1">Галерея</a>

				<img class="backgrounds" src="img/background/ddddd.jpg">

				<img class="gallery1" src="img/gallery/rest1.jpg">
				<img class="gallery2" src="img/gallery/2.jpg">
				<img class="gallery3" src="img/gallery/3.jpg">
				<img class="gallery4" src="img/gallery/4.jpg">
				<img class="gallery5" src="img/gallery/rest2.jpg">
				<img class="gallery6" src="img/gallery/1.png">
				<img class="gallery7" src="img/gallery/rest3.jpg">
				<img class="gallery8" src="img/gallery/5.jpg">
				<img class="gallery9" src="img/gallery/7.jpg">
				<img class="gallery10" src="img/gallery/6.jpg">
				<img class="gallery11" src="img/gallery/rest6.jpg">
				<img class="gallery12" src="img/gallery/8.jpg">
				<img class="gallery13" src="img/gallery/9.jpg">
				<img class="gallery14" src="img/gallery/10.jpg">
				<img class="gallery15" src="img/gallery/rest4.jpg">
				<img class="gallery16" src="img/gallery/11.jpg">
				<img class="gallery17" src="img/gallery/12.jpg">
			</article>
		</div>
	</div>

</body>
</html>
<!-- для текста -->
<style>
.caption{
	font-size: calc(var(--index) * 0.75);
	position: absolute;
  	color: #000000; /* Цвет обычной ссылки */
}

.big{
	font-size: calc(var(--index) * 2.2);
	position: absolute;
  	color: #ffffff; /* Цвет обычной ссылки */
}
.dungeon_text1{
    /* Галерея под названием Найтхорм */
    color: #ffffff;
    margin-top: calc(var(--index) * 11.4);
  	margin-left: calc(var(--index) * 31.8);
	z-index: 7;
}
.dungeon_text10{
	/* Найтхорм */
    color: #ffffff;
	margin-top: calc(var(--index) * 8.3);
  	margin-left: calc(var(--index) * 27.6);
	text-align: left;
	z-index: 9;
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
.backgrounds{
	width: 100vw;
	height: 370vh;
	position: absolute;
	z-index: 0;
	opacity: 0.4;
}
</style>

<style>
/* для галереи */
.gallery1{
	position: absolute;
	width: 30vw;
	height: 75vh;
	border: 0.7vw solid white;
	margin-top: calc(var(--index) * 15);
	margin-left: calc(var(--index) * 10);
}
.gallery2{
	position: absolute;
	width: 14vw;
	height: 35vh;
	border: 0.7vw solid white;
	margin-top: calc(var(--index) * 15);
	margin-left: calc(var(--index) * 32);
}
.gallery3{
	position: absolute;
	width: 17vw;
	height: 48vh;
	border: 0.7vw solid white;
	margin-top: calc(var(--index) * 15);
	margin-left: calc(var(--index) * 43);
}
.gallery4{
	position: absolute;
	width: 14vw;
	height: 35vh;
	border: 0.7vw solid white;
	margin-top: calc(var(--index) * 28.4);
	margin-left: calc(var(--index) * 32);
}
.gallery5{
	position: absolute;
	width: 17vw;
	height: 43vh;
	border: 0.7vw solid white;
	margin-top: calc(var(--index) * 33);
	margin-left: calc(var(--index) * 43);
}
.gallery6{
	position: absolute;
	width: 19vw;
	height: 50vh;
	border: 0.7vw solid white;
	margin-top: calc(var(--index) * 42);
	margin-left: calc(var(--index) * 10);
}
.gallery7{
	position: absolute;
	width: 25.3vw;
	height: 70vh;
	border: 0.7vw solid white;
	margin-top: calc(var(--index) * 42);
	margin-left: calc(var(--index) * 24.5);
}
.gallery8{
	position: absolute;
	width: 17vw;
	height: 47.3vh;
	border: 0.7vw solid white;
	margin-top: calc(var(--index) * 49.5);
	margin-left: calc(var(--index) * 43);
}
.gallery9{
	position: absolute;
	width: 19vw;
	height: 48.3vh;
	border: 0.7vw solid white;
	margin-top: calc(var(--index) * 60.5);
	margin-left: calc(var(--index) * 10);
}
.gallery10{
	position: absolute;
	width: 18vw;
	height: 51vh;
	border: 0.7vw solid white;
	margin-top: calc(var(--index) * 67.5);
	margin-left: calc(var(--index) * 24.5);
}
.gallery11{
	position: absolute;
	width: 24vw;
	height: 59vh;
	border: 0.7vw solid white;
	margin-top: calc(var(--index) * 67.5);
	margin-left: calc(var(--index) * 38.3);
}
.gallery12{
	position: absolute;
	width: 19vw;
	height: 54.3vh;
	border: 0.7vw solid white;
	margin-top: calc(var(--index) * 78.5);
	margin-left: calc(var(--index) * 10);
}
.gallery13{
	position: absolute;
	width: 18vw;
	height: 30.5vh;
	border: 0.7vw solid white;
	margin-top: calc(var(--index) * 86.5);
	margin-left: calc(var(--index) * 24.5);
}
.gallery14{
	position: absolute;
	width: 24vw;
	height: 23vh;
	border: 0.7vw solid white;
	margin-top: calc(var(--index) * 89);
	margin-left: calc(var(--index) * 38.3);
}
.gallery15{
	position: absolute;
	width: 27vw;
	height: 56vh;
	border: 0.7vw solid white;
	margin-top: calc(var(--index) * 98.5);
	margin-left: calc(var(--index) * 10);
}
.gallery16{
	position: absolute;
	width: 17vw;
	height: 56vh;
	border: 0.7vw solid white;
	margin-top: calc(var(--index) * 98.5);
	margin-left: calc(var(--index) * 30);
}
.gallery17{
	position: absolute;
	width: 16.4vw;
	height: 56vh;
	border: 0.7vw solid white;
	margin-top: calc(var(--index) * 98.5);
	margin-left: calc(var(--index) * 43.3);
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
	min-height: 360vh;
	background-size: cover;
	color: var(--text);
	display: flex;
	position: relative;
	/* Update: */
	top: -1px;
	z-index: 1;
}
</style>
