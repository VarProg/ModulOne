<?php 

function dd($str){
	echo "<pre>";
	var_dump($str);
	echo "</pre>";
}

// Вставляем наш компонент Flash в переменную $message и тем самым объявляем новый объект класса Flash;
$message = include 'flash.php';

// Устанавливаем ключ и сообщение данному объекту
$message->setFlashMessage('access', 'Register access');
$message->setFlashMessage('wrong', 'Wrong password');
dd($message);

// Вызываем методы
$message->displayFlashMessage('access');
echo "<hr>";
$message->displayFlashMessage('wrong');



