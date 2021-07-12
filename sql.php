<?php 

//Устанавливаем доступы к базе данных:
	$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
	$user = 'zacmpvji_trytix'; //имя пользователя, по умолчанию это root
	$password = 'dhjnvytyjub'; //пароль, по умолчанию пустой
	$db_name = 'zacmpvji_trytix'; //имя базы данных

//Соединяемся с базой данных используя наши доступы:
	$link = mysqli_connect($host, $user, $password, $db_name)
	or die('Не удалось соединиться: ' . mysql_error());

	function query($query) 
	{
		$result = mysqli_query($link, $query) or die( mysqli_error($link) );
		//$data = mysqli_fetch_assoc($result);
		/*
			Укажем функции с помощью инструкции 'return', 
			что мы хотим, чтобы она ВЕРНУЛА текст, а не вывела на экран:
		*/
		echo $result;	
		//return $data;
	}

	     $query = "SELECT * FROM users WHERE alias='test'";
		 $result = mysqli_query($link, $query) or die( mysqli_error($link) );
		 $user = mysqli_fetch_assoc($result);
		 $user = $user['id'];

		 //echo "скриптом: $user";

		 echo "А это вот не скриптом:";

		 echo query("SELECT * FROM users WHERE alias='test'");

?>