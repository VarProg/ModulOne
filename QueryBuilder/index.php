<?php 
// Файл для отладки компонента.
function dd($str){
	echo "<pre>";
	var_dump($str);
	echo "</pre>";
	die();
}

$db = include 'QueryBuilder.php';

$getPosts = $db->getAll('test');

$getPost = $db->getOne('test', '1');

// $createPost = $db->create('test', [
// 				'id' => '15',
// 				'title' => 'Whats Upp'
// 				]);

// $updatePost = $db->update('test', [
// 				'title' => 'I Love Programming'], 
// 				$_GET['id']);

// $deletePost = $db->delete('test', $_GET['id']);


dd($getPost);
echo "<hr>";
dd($getPosts);


?>
