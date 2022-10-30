 <?php

session_start();

include __DIR__ . '/functions.php'; 

if (isset($_POST['user']) && isset($_POST['password'])) {
	if (сheckPassword($_POST['user'], $_POST['password'])) {
		$_SESSION['user'] = $_POST['user'];
	}
}


function getDateBirthday() {
	 $day=(int) $_POST['day'];
	$month=(int) $_POST['month'];
	$year=(int) $_POST['year'];
	if ($day==0||$month==0||$year==0) 
	{
		echo ("<font class=regEr>&nbspВы не ввели дату рождения.</font>");
	}
	else {
		echo ("Ваш день рождения: " . $day .".".$month.".". $year);
	}
		}



// Если пользователь вошел - перенаправляем на страницу, в противном случае - форма
if (null !== getCurrentUser()) {
	 header('Location: index.php');
} else {
	 header('Location: ../login.php'); 
}



// function getDateBirthday() {
// 	   $day=(int) $_POST['day'];
// 		$month=(int) $_POST['month'];
// 		$year=(int) $_POST['year'];
// 		if ($day==0||$month==0||$year==0) 
// 		{
// 			 echo ("<font class=regEr>&nbspВы не ввели дату рождения.</font>");
// 		}
// 		else {
// 			echo ("Ваш день рождения: " . (int) $_POST['day'] .".".(int) $_POST['month'].".". (int) $_POST['year']."<br>");
// 		// }
// 		}
// }

// if (null !== getDateBirthday()) {  
// 	echo (getDateBirthday());
// }
?>