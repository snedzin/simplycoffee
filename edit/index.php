<?php
//Устанавливаем доступы к базе данных:
	$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
	$user = 'zacmpvji_trytix'; //имя пользователя, по умолчанию это root
	$password = 'dhjnvytyjub'; //пароль, по умолчанию пустой
	$db_name = 'zacmpvji_trytix'; //имя базы данных

//Соединяемся с базой данных используя наши доступы:
	$link = mysqli_connect($host, $user, $password, $db_name)
	or die('Не удалось соединиться: ' . mysql_error());
	 	
 	$page = 'lol';//Если идентификатор не передан - используем посадочную страницу

 	function ShowItems($link, $page, $info = '') {

 	 $query = "SELECT * FROM users WHERE alias='$page'";
	 $result = mysqli_query($link, $query) or die( mysqli_error($link) );
	 $user = mysqli_fetch_assoc($result);
	 $brand = $user['brand'];
	 $user = $user['alias'];

	 $query = "SELECT * FROM offers WHERE alias='$user'";
	 $result = mysqli_query($link, $query) or die( mysqli_error($link) );
	 $offer_id = mysqli_fetch_assoc($result);
	 $offer_id = $offer_id['id'];
	 //echo $offer_id;

	 $query = "SELECT * FROM offer_items WHERE offer_id=$offer_id";
	 $result = mysqli_query($link, $query) or die( mysqli_error($link) );
	 for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);	

	 $button = '<a class="btn btn-outline-light btn-sm" href="./add.php">+ Добавить позицию</a>';

	 $content = '';
	 foreach ($data as $page) {
	 	$content .= "
	 	<div class='item'>
		 	<h2 class='name'>{$page['name']}
		 	<a class='badge badge-danger' href = \" ./?delItem={$page['id']}\">Удалить</a>
		 	<a class='badge badge-primary' href = \" ./edit.php?id={$page['id']}\">Изменить</a></h2>
		 	<div class='values'>
				Выход: <span class='value'>{$page['item_value']}</span> / 
				Цена: <span class='price'>{$page['price']}</span>
			</div>
	 	</div><hr>";

	 }
	 //echo $content;
	 include "../layout.php";

 	}

 	function DeleteItem($link) {
 		if(isset($_GET['delItem'])) {
 			$id = $_GET['delItem'];
 			$query = "DELETE FROM offer_items WHERE id=$id";
	 		mysqli_query($link, $query) or die( mysqli_error($link) );

	 		return[
		 			"text" => "Удален пункт",
		 			"status" => "success"
		 		];
 		}
 	}

$info = DeleteItem($link);
if (isset($_GET['added'])) {
	$info = [
		"text" => "Добавлен новый пункт: $name",
		"status" => "success"
	];
}
ShowItems($link, $page, $info);
	?>