<?php 

/*
Принимаем файл с ассоциативным массивом нашей конфигурации методом include файлом 'config.php' для дальнейшей работы с Базой Данных. 
 */
$config = include 'config.php';

/**
 * Создаем класс Connection для соединения с базой данных;
 * Передаем параметры конфигурации из массива $config(переменная $config типа array);
 * Возвращаем соединение с БД в виде переменной $pdo. 
 */
class Connection
{
	
	public static function make(array $config){
	$pdo = new PDO(
		"{$config['connection']}; dbname={$config['database']}; charset={$config['charset']};",
		 $config['username'],
		 $config['password']);

		return $pdo;
	}
}

/*
Компонент QueryBuilder - строитель sql запросов на базе PDO.
Принимает свойство $pdo типа object для соединения с БД и передает его во все функции данного класса;
Включает в себя публичные функции:
1. function getAll($table) - функция принимает название таблицы БД типа string, возвращает ассоциативный массив со всеми данными указанной таблицы БД;
2. function getOne($table, $id) - функция принимает название таблицы БД типа string, возвращает ассоциативный массив с данными строки, указанной идентификатором $id типа int;
3. function create($table, $data) - функция принимает название таблицы БД типа string, создает новую строку в таблице по параметрам из массива $data и их значениям; 
4. function update($table, $data, $id) - функция принимает название таблицы БД типа string, обновляет данные указанной идентификатором строки $id типа int по параметрам из массива $data и их значеням;
4. function delete($table, $id) - функция принимает название таблицы Бд типа string, удаляет строку с данными в таблице по указанному идентификатору $id типа int.

 */
class QueryBuilder
{
	protected object $pdo;

	public function __construct(object $pdo){

		$this->pdo = $pdo;
	}

	public function getAll(string $table){
		$stmt = $this->pdo->prepare("SELECT * FROM $table");
		$stmt->execute();
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}

	public function getOne(string $table, int $id){

		$sql = "SELECT * FROM {$table} WHERE id=:id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function create(string $table, array $data){
		$keys = implode(', ', array_keys($data));
		$tags = ":" . implode(', :', array_keys($data));

		$sql = "INSERT INTO {$table} ({$keys}) VALUES({$tags})";

		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($data);
	}

	public function update(string $table, array $data, int $id)
	{
		$keys = array_keys($data);

		$string = '';

		foreach ($keys as $key) {
			$string .= "$key" . '=:' . "$key" . ',';
		}

		$keys = rtrim($string, ',');
		$data['id'] = $id;

		$sql = "UPDATE {$table} SET {$keys} WHERE id=:id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($data);
	}

	public function delete(string $table, int $id){

		$sql = "DELETE FROM {$table} WHERE id=:id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute([
				'id' => $id
			]);

	}
}

/*
Используя статичную функцию make класса Connection, создается соединение с Базой Данных как объект класса QueryBuilder и возвращается при вызове данного файла для дальнейшей работы с компонентом QueryBuilder. 
 */
return new QueryBuilder(Connection::make($config['database']));



?>