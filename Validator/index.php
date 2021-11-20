<?php 
// Файл для отладки.

session_start();
function dd($str){
	echo "<pre>";
	var_dump($str);
	echo "</pre>";
}

// Вставляем наш компонент Validator в переменную $person и тем самым объявляем новый объект класса Validator;
// Указываем email данного объекта методом setEmail('email');
// Указываем password данного объекта методом setPassword('password');
// Вызываем метод register для валидации регистрации;
// Вызываем метод login для валидации авторизации;
$person = include 'validator.php';

$person->setEmail($_GET['email']);
$person->setPassword($_GET['password']);


dd($person->register());
// dd($person->login());

echo $_SESSION['flash'];