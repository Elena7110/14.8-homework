<?php
session_start();
// include __DIR__ . '/functions.php';
?>
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
	<link rel="stylesheet" type="text/css" href="style.css" media="all">
</head>

<body style="background-image:url(../img/medusa-1.jpg);background-size:50%;background-repeat:no-repeat;background-attachment:fixed;background-position:left;">

	<div style="border: 1px solid black;display: flex;flex-direction: column;width:30%;top: 50%;margin:auto 20% auto auto;">




		<?php
		// Возвращаем массив всех пользователей
		function getUsersList()
		{
			return include __DIR__ . '/data.php';
		};



		// Проверка существования пользователя
		function existsUser($login)
		{
			$users = getUsersList();
			foreach ($users as $user) {
				if ($user['login'] === $login) {
					return true;
				}
			}
			return false;
		}

		// Проверка пользователя
		function checkPassword($login, $password)
		{
			if (true === existsUser($login)) {
				$users = getUsersList();
				foreach ($users as $user) {
					if ($user['login'] === $login) {
						if (password_verify($password, $user['password'])) {
							return true;
						}
					}
				}
			}
			// echo ("<p>Неверный логин или пароль!</p> ");
			return false;
		}
		assert(true === checkPassword('Katya', '234'));
		assert(true === checkPassword('Tanya', '123'));
		assert(false === checkPassword('Vasya1', '123'));
		assert(false === checkPassword('Vasya', '12345'));
		assert(false === checkPassword('Vasya1', '12345'));

		// Получаем имя текущего пользователя
		function getCurrentUser()
		{
			if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
				return $_SESSION['user'];
			} else {
				
				return null;
			}
		}

		if (isset($_POST['user']) && isset($_POST['password'])) {
			if (checkPassword($_POST['user'], $_POST['password'])) {
				$_SESSION['user'] = $_POST['user'];
			}
			else{
				$_SESSION['message'] = 'Не верный логин или пароль';
			}
			
		}

		// Получаем дату рождения пользователя
		function getDateBirthday()
		{
			$_SESSION['day'] = (int) $_POST['day'];
			$_SESSION['month'] = (int) $_POST['month'];
			$_SESSION['year'] = (int) $_POST['year'];

			if ($_SESSION['day'] == 0 || $_SESSION['month'] == 0 || $_SESSION['year'] == 0) { // проверка заполненности данных
				echo ("<font class=regEr>&nbsp<p>Вы не ввели дату рождения</p>.</font>");
			} else {
				echo ("<p>Ваш день рождения:</p> " . $_SESSION['day'] . "." . $_SESSION['month'] . "." . $_SESSION['year']);
			}
		}


		// Если пользователь вошел - перенаправляем на страницу, в противном случае - форма
		if (null !== getCurrentUser()) {
		} else {
			header('Location: ../login.php');
		}

		// выводим приветствие по имени пользлователя и дату рождения
		if (null !== getCurrentUser()) { ?>
			<h1>Здравствуйте, <?php
									echo (getCurrentUser());
								} ?></h1>


			<?php
			if (null !== getDateBirthday()) {
				echo (getDateBirthday());
			}


			// вычисляем колличество оставшихся дней до дня рождения
			$birthday = $_SESSION['day'] . "." . $_SESSION['month'] . "." . $_SESSION['year']; // присваиваем переменной полученные из формы число, месяц и год рождения
			$today = date('d.m'); // настоящее время, день и месяц
			$birthdayDate = $_SESSION['day'] . "." . $_SESSION['month']; // день и месяц из формы
			$cd = new \DateTime('today'); // сегодня, время 00:00:00
			$bd = new \DateTime($birthday); // объект Дата дня рождения
			$bd->setDate($cd->format('Y'), $bd->format('m'), $bd->format('d')); // yстанавливаем текущий год, оставляем месяц и день
			$tmp = $cd->diff($bd); // pазница дат
			if ($tmp->invert) { // eсли в этом году уже был (разница "отрицательная")
				$bd->modify('+1 year'); // добавляем год
				$tmp = $cd->diff($bd); // снова вычисляем разницу
			}
			echo ("<p style = color:red; font-size: 40px;>Дней до вашего дня роджения осталось: <p>" . $tmp->days . "<br>"); // результат в днях
			if ($today == $birthdayDate) { // условие, если день рождения сегодня
				echo ("<p style = color:red;>С днем рождения! Для вас сегодня действует скидка 5% на все услуги!<p>" . "<br>");
			}


			// выводим время последнего визита
			$last = isset($_COOKIE['last']) ? $_COOKIE['last'] : 'никогда';

			setcookie('last', date('H:i:s'), time() + 3600 * 24 * 31, '/');
			?>
			<p>Последний раз вы заходили: </p> <?php echo $last . "<br><p></p>"; ?>



			<div class="sale">
				<h3>Акция! Скидка на окрашивание "Airtouch" - 30%</h3>


				<?php
				$datetime3 = new DateTime(date("H:i:s")); //получаем текущее время
				$datetime4 = new DateTime('23:59:59'); //время, до которого действует акция
				$interval2 = $datetime3->diff($datetime4); //считаем разницу для времени
				echo ("<p>До конца акции осталось:</p> " . $interval2->format(' %h ч. %i мин. %s сек.') . "<br><p></p>");
				?>

			</div>

			<a href="logout.php" class="logout">Выход</a><br>

	</div>
</body>

</html>