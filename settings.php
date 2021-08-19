<?php
//Устанавливаем доступы к базе данных:
	$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
	$user = 'zacmpvji_trytix'; //имя пользователя, по умолчанию это root
	$password = 'dhjnvytyjub'; //пароль, по умолчанию пустой
	$db_name = 'zacmpvji_trytix'; //имя базы данных


//Соединяемся с базой данных используя наши доступы:
    $link = mysqli_connect($host, $user, $password, $db_name)
    or die('Не удалось соединиться: ' . mysql_error());