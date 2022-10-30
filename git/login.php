 <?php

session_start();

include __DIR__ . '/pages/functions.php'; 

// Если данные пришли проверяем их и записываем данные в сессию
// if (isset($_POST['user']) && isset($_POST['password'])) {
// 	if (сheckPassword($_POST['user'], $_POST['password'])) {
// 		$_SESSION['user'] = $_POST['user'];
// 	}
// }

// Если пользователь вошел - перенаправляем на страницу, в противном случае - форма
// if (null !== getCurrentUser()) {
// 	header('Location: pages/index.php');
// } else { ?>
	<!DOCTYPE html>
	<!--атрибут lang определяет язык содержимого элемента.-->
	<html lang="ru">

	<!--метаданные-->

	<head>
		<!--данная запись указывает браузеру кодировку в которой была написана данная страница - формат документа и раскладку клавиатуры-->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!--призывает Internet Explorer работать в определённом режиме документа-->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--мeta-тег viewport сообщает браузеру о том, как именно обрабатывать размеры страницы, и изменять её масштаб-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--определяет заголовок документа, который отображается в заголовке окна браузера или на вкладке страницы.-->
		<title>14.8</title>
		<!--подключение файла стилей-->
		<link rel="stylesheet" type="text/css" href="pages/style.css" media="all">
	</head>

	<body style="background-image:url(img/top.jpg);background-size:cover;background-attachment:fixed;background-position:center;">
		<h1 class="title">Парикмахерская "Горгона"</h1>
		<form method="post" action="pages/login_processing.php" class="form" >
			<label>Логин</label>
			<input type="text" name="user" placeholder="Введите свой логин">
			<label>Пароль</label>
			<input type="password" name="password" placeholder="Введите пароль">
			<label>Дата рождения</label>
		<input type="number" name="day" id="day" min="1" max="31" placeholder="Введите день рождения">
		<input type="number" name="month" id="month" min=" 1" max="12" placeholder="Введите месяц рождения">
		<input type="number" name="year" id="year" min="1900" max="2022" placeholder="Введите год рождения">
			<button type="submit">Войти</button>
		</form>
	</body>

	</html>


