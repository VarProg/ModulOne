<?php 

/**
 * Создаем класс Validator;
Класс имеет свойство $email и свойство $password;
Метод setEmail, принимает входящий email типа string и передает его в свойство объекта $email;
Метод setPassword, принимает входящий password типа string и передает его в свойство объекта $password;
Метод register - проверяет существует ли указанный емэйл и пароль, создает hash пароля, задает флэш сообщение и возвращает true or false;
Метод login - проверяет существует ли емейл и пароль, назначает флэш сообщение и возвращает true or false.
 */
class Validator
{
	
	public string $email;
	public string $password;

	public function setEmail(string $email){
		if (!isset($email)){
			$_SESSION['flash'] = "Введите емэйл!"; exit;
		} 
		$this->email = $email;
	}

	public function setPassword(string $password){
		if (!isset($password)) {
			$_SESSION['flash'] = "Введите пароль"; exit;	
		} 
		$this->password = $password;
	}

	public function register(){
		if (isset($this->email) and isset($this->password)) {
			$this->password = password_hash($this->password, PASSWORD_DEFAULT);
			$_SESSION['flash'] = "Регистрация успешна!";
			return true;
		}
	}

	public function login(){
		if (isset($this->email) and isset($this->password)) {
			$_SESSION['flash'] = "Авторизация успешна!";
			return true;
		}
		
	}
}

return new Validator;