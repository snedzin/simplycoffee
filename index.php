<?php
//Устанавливаем доступы к базе данных:
include 'settings.php';

//Переключение между лендингом и функциональными сраницами
	 if (isset($_GET['id'])) {

	 	$page = $_GET['id']; //Если идентификатор заведения передан - используем функциональную страницу меню

	 	//Открыть страницу запрошенную в ссылке
		 $query = "SELECT * FROM users WHERE alias='$page'";
		 $result = mysqli_query($link, $query) or die( mysqli_error($link) );
		 $user = mysqli_fetch_assoc($result);
		 $user = $user['alias'];
		 //echo "$user";

		 $query = "SELECT * FROM users WHERE alias='$page'";
		 $result = mysqli_query($link, $query) or die( mysqli_error($link) );
		 $brand = mysqli_fetch_assoc($result);
		 //$brand = $brand['brand'];

		 $query = "SELECT * FROM offers WHERE alias='$user'";
		 $result = mysqli_query($link, $query) or die( mysqli_error($link) );
		 $offer_id = mysqli_fetch_assoc($result);
		 $offer_id = $offer_id['id'];
		 //echo $offer_id;

		 $query = "SELECT * FROM offer_items WHERE offer_id=$offer_id";
		 $result = mysqli_query($link, $query) or die( mysqli_error($link) );
		 for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

		 $content = ''; //Объявляем переменную и наполняем ее контентом. Ниже приведена верстка и переменные массива для наполнения.
		 
		 foreach ($data as $page) {
		 	$content .= "<div class='item'>
		 					<h2 class='name'>{$page['name']}</h2>
		 					<p class='descr'>{$page['descr']}</p> 
			 				<div class='values'>
			 					Выход: <span class='value'>{$page['item_value']}</span> / 
			 					Цена: <span class='price'>{$page['price']}</span>
			 				</div>
			 			</div><hr>";
		 }
		 //echo "$content"; //выводим тестово содержимое переменной $content
		 include 'layout.php';//Подключили морду меню

	 } else {

	 	$page = 'test';//Если идентификатор не передан - используем посадочную страницу

		 $query = "SELECT * FROM users WHERE alias='$page'";
		 $result = mysqli_query($link, $query) or die( mysqli_error($link) );
		 $user = mysqli_fetch_assoc($result);
		 $user = $user['alias'];
		 //echo "$user";

		 $query = "SELECT * FROM users WHERE alias='$page'";
		 $result = mysqli_query($link, $query) or die( mysqli_error($link) );
		 $brand = mysqli_fetch_assoc($result);
		 $brand = $brand['brand'];

		 $query = "SELECT * FROM offers WHERE alias='$user'";
		 $result = mysqli_query($link, $query) or die( mysqli_error($link) );
		 $offer_id = mysqli_fetch_assoc($result);
		 $offer_id = $offer_id['id'];
		 echo $offer_id;

		 $query = "SELECT * FROM offer_items WHERE offer_id=$offer_id";
		 $result = mysqli_query($link, $query) or die( mysqli_error($link) );
		 //$page = mysqli_fetch_assoc($result);
		 for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

		 $content = '';
		 foreach ($data as $page) {
		 	$content .= "<div class='item'>
		 					<h2 class='name'>{$page['name']}</h2>
		 					<p class='descr'>{$page['descr']}</p> 
			 				<div class='values'>
			 					Выход: <span class='value'>{$page['item_value']}</span> / 
			 					Цена: <span class='price'>{$page['price']}</span>
			 				</div>
			 			</div><hr>";
		 }
		 $title = 'Проста кава крапельна';
		 include 'layout.php';

	 }
	?>