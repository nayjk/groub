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
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Меню</title>

	<link rel="stylesheet" href="css/main.css">

	<script src="js/gsap.min.js" defer></script>
	<script src="js/ScrollTrigger.min.js" defer></script>
	<script src="js/ScrollSmoother.min.js" defer></script>

	<script src="js/app.js" defer></script>
	<script src="js/filter.js" defer></script>

</head>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

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
        <a class="caption dungeon_text1">Меню</a>
		
        <div class="panel">

		

        <div id="myBtnContainer" class="buttons">
			<center><button class="btn active" onclick="filterSelection('all')"> Показать все</button><br>
			<button class="btn" onclick="filterSelection('dishes')">Мясо</button><br>
			<button class="btn" onclick="filterSelection('drinks')">Десерты и напитки</button><br>
			<button class="btn" onclick="filterSelection('garnish')">Гарниры</button><br>
			<button class="btn" onclick="filterSelection('kids')">Детское меню</button>
			<button class="btn" onclick="filterSelection('pasta')">Паста и ризотто</button>
			<button class="btn" onclick="filterSelection('salad')">Закуски и салаты</button>
			<button class="btn" onclick="filterSelection('sauces')">Соусы</button>
			<button class="btn" onclick="filterSelection('seafood')">Рыба и морепродукты</button>
			<button class="btn" onclick="filterSelection('soups')">Супы</button></center>
		</div>
		</div>
		<div class='formenu'>
		<?php
// вывод меню из бд
$conn = new mysqli("localhost", "root", "root", "site");
$sql = "SELECT * FROM menu";
if($result = $conn->query($sql)){

    foreach($result as $row){

        echo "
			<div class = 'filterDiv " . $row["filter"] . "'>
				<img class = 'products' src='" . $row["img"] . "'>
				<div class = 'names'>
					<b>" . $row["name"] . "</b> " . $row["description"] . "
				</div>
				<div class = 'cost'>
					" . $row["cost"] . "руб.
				</div>
			</div>
			
		";      
    }
	
	$result->free();
				
} else{
	echo "Ошибка: " . $conn->error;
}
$conn->close();
?>
			</div>	
		</article>
	</div>
</div>

</body>
</html>
<style>
.cost{
	position: absolute;
	margin-top:  calc(var(--index) * -2);
	margin-left: calc(var(--index) * 9);
	font-size: 1.8vh;
	font-weight: 500;
	color: black;
	margin-left: 4.6vw;
}
.names{
	position: absolute;
	margin-top:  calc(var(--index) * -4.3);
	font-size: 1.7vh;
	color: black;
	margin-left: 4.6vw;
}
.buttons{
	margin-top: 41vh;
}
.container {
  	overflow: hidden;
}

.filterDiv {
	float: left;
	display: none; /* Скрыто по умолчанию */
}

/* В класс "show" добавляется к отфильтрованные элементы */
.show {
  	display: block;
}

/* Стиль кнопок */
.btn {
	margin-top: 4vh;
	border: none;
	outline: none;
	height: 4vh;
	width: 14vw;
	cursor: pointer;
}

/* Добавить светло-серый фон на наведении курсора мыши */
.btn:hover {
  	background-color: rgba(255,255,255,0.25);
}

/* Добавить темный фон для активной кнопки */
.btn.active {
  	background-color: rgba(255,255,255,0.1);
  	color: white;
}

</style>
<!-- для текста -->
<style>
.formenu{
	margin-top: 40vh;
	margin-left: 25.5vw;
	width: 72vw;
}
.panel{
	z-index: 80;
	position: absolute;
	opacity: 1;
	height: 200%;
	width: 24vw;
}
.products{
	height: 36vh;
	border-top: 2vh solid white;
	border-left: 2vw solid white;
	border-right: 2vw solid white;
	border-bottom: 13vh solid white;
	margin-top: 5vh;
	margin-left: 2.5vw;
	z-index: 10;
	opacity: 1;
}
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
    /* Доставка под названием Найтхорм */
    color: #ffffff;
    margin-top: calc(var(--index) * 11.4);
  	margin-left: calc(var(--index) * 31.8);
}
.dungeon_text2{
    /* Как осуществляется доставка*/
    color: #000000;
    margin-top: calc(var(--index) * 14.4);
  	margin-left: calc(var(--index) * 23);
	text-align: center;
}
.dungeon_text3{
    /* Ожидает подтверждения*/
    color: #000000;
    margin-top: calc(var(--index) * 17.4);
  	margin-left: calc(var(--index) * 2);
	text-align: center;
}
.dungeon_text4{
    /* Подтверждён*/
    color: #1ecf9a;
    margin-top: calc(var(--index) * 25.4);
  	margin-left: calc(var(--index) * 2.5);
	text-align: center;
}
.dungeon_text5{
    /* Готовится*/
    color: #d9c91c;
    margin-top: calc(var(--index) * 32.4);
  	margin-left: calc(var(--index) * 3);
	text-align: center;
}
.dungeon_text6{
    /* В пути*/
    color: #d25018;
    margin-top: calc(var(--index) * 39.4);
  	margin-left: calc(var(--index) * 3.7);
	text-align: center;
}
.dungeon_text7{
    /* Выполнен*/
    color: #0fc72a;
    margin-top: calc(var(--index) * 46.4);
  	margin-left: calc(var(--index) * 3);
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
	margin-top: calc(var(--index) * 50);
	margin-left: calc(var(--index) * 7);
	width: 10vw;
  	height: 10vw;
	position: absolute;
	opacity: 0.5;
}
.photo_7{
	margin-top: calc(var(--index) * 59.8);
	margin-left: calc(var(--index) * 52);
	width: 10vw;
  	height: 10vw;
	position: absolute;
	opacity: 0.5;
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
	margin-top: calc(var(--index) * 56);
	width: 22vw;
	height: 3vw;
	position: absolute;
	font-size: 1vw;
}
.place2{
	margin-top: calc(var(--index) * 59);
	width: 22vw;
	height: 3vw;
	position: absolute;
	font-size: 1vw;
}
.place3{
	margin-top: calc(var(--index) * 62);
	width: 22vw;
	height: 8vw;
	position: absolute;
	font-size: 1.1vw;
}
.button1{
	margin-top: calc(var(--index) * 69);
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
	min-height: 120vh;
	background-size: cover;
    background-color: black;
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
