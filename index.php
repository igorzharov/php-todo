<?php

session_start();
require_once "connect.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>todo</title>

	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

	<link rel="stylesheet" href="./libs/magnific-popup/magnific-popup.css">
	<link rel="stylesheet" href="./libs/magnific-popup/magnific-popup-fade-zoom.css">
	<link rel="stylesheet" href="./css/main.css">

</head>

<body>

	<div class="container">

		<?php echo ($_SESSION['user']) ? '<h1 class="h1">Привет! ' . $_SESSION['user']['username'] . '</h1>' : ''; ?>

		<h1 class="h1">Задачи:</h1>

		<?php require_once "sorting.php"; ?>

		<?php require_once "posts.php"; ?>

		<?php require_once "pagination.php"; ?>

		<?php mysqli_close($connect) ?>

		<a class="button add-new-post open-popup" href="#add-new-post">Добавить новую запись</a>

		<?php echo (!$_SESSION['user']) ? '<a class="button sign-in open-popup" href="#sign-in">Войти</a>' : '<a class="button" href="logout.php" type="submit">Выйти</a>' ?>

		<!-- Невидимые попап окна -->

		<div id="add-new-post" class="zoom-anim-dialog mfp-hide">

			<h1>Введите данные:</h1>

			<form class="form-add-new-post" action="addpost.php" method="post">

				<label>Имя:</label>
				<input name="user" type="text" minlength="2" maxlength="20">

				<label>Email:</label>
				<input name="email" type="text" maxlength="30">

				<label>Задача:</label>
				<textarea name="text" rows="5" maxlength="500"></textarea>

				<button class="button" type="submit">Добавить запись</button>

			</form>

		</div>
		<!-- add-new-post -->

		<div id="popup-response" class="popup-response zoom-anim-dialog mfp-hide">
			<h3 class="title response-title"></h3>
			<p class="response-text"></p>
		</div>
		<!-- popup-response -->

		<div id="sign-in" class="zoom-anim-dialog mfp-hide">

			<h1>Введите данные:</h1>

			<form class="form-sign-in" method="post">

				<label>Логин:</label>
				<input name="username" type="text" minlength="2" maxlength="20">

				<label>Пароль:</label>
				<input name="password" type="password" maxlength="30">

				<p class="message"></p>

				<button class="button" type="submit">Авторизоваться</button>

			</form>

		</div>
		<!-- sign-in -->

	</div>

	<!-- Подключаю js -->
	<script src="./libs/jquery/jquery.js"></script>
	<script src="./libs/magnific-popup/magnific-popup.js"></script>
	<script src="./js/main.js"></script>

</body>

</html>