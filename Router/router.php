<?php

/*
Класс Router должен содержать массив с соответствием маршрутов с url и файлов направления;
Принимать маршрут из браузера $_SERVER['REQUEST_URI'];
Проверять находится ли данный url в массиве;
Если url находится в массиве возвращать соответствующий маршрут;
Если нет, то выводить ошибку 404 файл не найден. 
*/

class Router
{
	
	public $routes = [
					'/' => '/controllers/homepage.php',
					'/about' => '/controllers/about.php',
					'/create' => '/controllers/create.php',
					'/store' => '/controllers/store.php',
					'/update' => '/controllers/update.php',
				];

	public $route;

	public function execute($route){
		$routes = $this->routes;
		if (array_key_exists($route, $routes)){
			header("Location: $routes[$route]") ;
			// include $routes[$route];
		} else {
			header("Location: /controllers/error404.php");
		}
	}

	
}

return new Router;








