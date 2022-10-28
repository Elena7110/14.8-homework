<?php
session_start();
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

<div class="profile">



	<?php
	include __DIR__ . '/functions.php';

	if (null !== getCurrentUser()) { ?>
	<h1>	Здравствуйте, <?php echo getCurrentUser(); ?></h1>
	<?php
	}
	?>
	<br>
	
	<?php
if (null !== getDateBirthday()) {  
	echo getDateBirthday();
}
		
   // echo ("Ваш день рождения: " . (int) $_POST['day'] .".".(int) $_POST['month'].".". (int) $_POST['year']."<br>");
		
			 
	// $date = new DatePeriod('date');
	//   $birthday = $date;

	//   $cd = new \DateTime('today'); // Сегодня, время 00:00:00
	//   $bd = new \DateTime($birthday); // Объект Дата дня рождения
	//   $bd->setDate($cd->format('Y'), $bd->format('m'), $bd->format('d')); // Устанавливаем текущий год, оставляем месяц и день
	//   $tmp = $cd->diff($bd); // Разница дат
	//   if($tmp->invert){ // Если в этом году уже был (разница "отрицательная")
	// 		$bd->modify('+1 year'); // Добавляем год
	// 		$tmp = $cd->diff($bd); // Снова вычисляем разницу
	//   }
	//   echo $tmp->days; // Результат в днях
?>
	<a href="logout.php" class="logout">Выход</a>

	</div>
</body>

</html>