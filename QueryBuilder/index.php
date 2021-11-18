<?php 
// Файл для отладки компонента.
function dd($str){
	echo "<pre>";
	var_dump($str);
	echo "</pre>";
	die();
}

$db = include 'QueryBuilder.php';
$posts = $db->getAll('test');

dd($posts);



?>