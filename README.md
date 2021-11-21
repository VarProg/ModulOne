# ModulOne
	
# Validator

1. Вставляем наш компонент Validator в переменную $person и тем самым объявляем новый объект класса Validator;

	$person = include 'validator.php';
	
2. Указываем email данного объекта методом setEmail('email');

	$person->setEmail($_POST['email']);
	
3. Указываем password данного объекта методом setPassword('password');

	$person->setPassword($_POST['password']);
	
4. Вызываем метод register для валидации регистрации;

	$person->register();
	
5.  Вызываем метод login для валидации авторизации;

	$person->login();
	
