<?php 

/**
 * Класс Flash;
 * Включает в себя два метода:
 * Метод setFlashMessage - создает сессию c flash сообщением, принимает $key и $message;
 * метод displayFlashMessage - выводит flash сообщение по указанному ключу, принимает $key;
 */
class Flash
{
	
	public $key;

	public $message;

	public function setFlashMessage($key, $message){
		$this->key = $key;
		$this->message = $message;
		$_SESSION[$this->key] = $this->message;
	}

	public function displayFlashMessage($key){
		$this->key = $key;
		echo $_SESSION[$this->key];
		unset($_SESSION[$this->key]);
	}
}

return new Flash;