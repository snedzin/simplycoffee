<?php
//Устанавливаем доступы к базе данных:
	$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
	$user = 'zacmpvji_trytix'; //имя пользователя, по умолчанию это root
	$password = 'dhjnvytyjub'; //пароль, по умолчанию пустой
	$db_name = 'zacmpvji_trytix'; //имя базы данных

//Соединяемся с базой данных используя наши доступы:
	$link = mysqli_connect($host, $user, $password, $db_name)
	or die('Не удалось соединиться: ' . mysql_error());

	$list_id = '3'; // Заменить на определение пользователя после логина

	// Загружаем название заведения
	$query = "SELECT * FROM offers WHERE id='$list_id'";
	$result = mysqli_query($link, $query) or die( mysqli_error($link) );
	$page = mysqli_fetch_assoc($result);
	$page = $page['alias'];

	$query = "SELECT * FROM users WHERE alias='$page'";
	$result = mysqli_query($link, $query) or die( mysqli_error($link) );
	$brand_name = mysqli_fetch_assoc($result);
	$brand = $brand_name['brand'];
	
	function getPage ($link, $brand, $info = '') {

		$title = "Admin add page";

		$id = $_GET['id'];
		$query = "SELECT * FROM offer_items WHERE id='$id'";
		$result = mysqli_query($link, $query) or die( mysqli_error($link) );
		$page = mysqli_fetch_assoc($result);

		if ($page) {

			$offer_id = $list_id;
			$name =  $page['name'];
			$price = $page['price'];
			$item_value = $page['item_value'];
			$description = $page['descr']; 

			$content = '<form method="POST">
						Название позиции:<br>
						<input type="text" name="name" value="'.$name.'" placeholder="Укажите название"> <br><br>
						Описание позиции:<br>
						<textarea name="descr" placeholder="Укажите описание">'.$description.'</textarea> <br><br>
						Выход:<br>
						<input type="text" name="item_value" value="'.$item_value.'" placeholder="Укажите выход"> <br><br>
						Цена:<br>
						<input type="text" name="price" value="'.$price.'" placeholder="Укажите цену"><br><br>
						<input type="submit">
					</form>';
			$button = '<a class="btn btn-outline-light btn-sm" href="./">⇽ Назад</a>';
		} else {
			$content = 'Такой страницы не существует.';
		}

		include "../layout.php";
	}

	function addItem($link, $list_id) {

		if (isset($_POST['name']) and isset($_POST['item_value']) and isset($_POST['price'])) {

			$offer_id = $list_id;
			$name = $_POST['name'];
			$price = $_POST['price'];
			$item_value = $_POST['item_value'];
			$description = $_POST['descr'];

			if (isset($_GET['id'])) {
				$id = $_GET['id'];

				$query = "SELECT * FROM offer_items WHERE id='$id'";
				$result = mysqli_query($link, $query) or die( mysqli_error($link) );
				$page = mysqli_fetch_assoc($result);

				if ($page['name'] !== $name) {

					$query = "SELECT COUNT(*) as count FROM offer_items WHERE name='$name'";
					$result = mysqli_query($link, $query) or die( mysqli_error($link) );
					$isPage = mysqli_fetch_assoc($result)['count'];
					if ($isPage == 1) {
						return [
							"text" => "Позиция с именем $name уже существует.", 
							"status" => "warning"
						];
					}

				} /*else {
					return [
							"text" => "Позиция с именем $name не существует.", 
							"status" => "warning"
						];
				}*/

			$query = "UPDATE offer_items SET item_value='$item_value', name='$name', price='$price', descr='$description' WHERE id=$id";
		 	mysqli_query($link, $query) or die( mysqli_error($link) );

		 	return [
					"text" => "Позиция $name обновлена.", 
					"status" => "success"
				];
			}
		}
	}

	$info = addItem($link, $list_id);
	getPage($link, $brand, $info);

	?>