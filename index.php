<?php
// Параметры для подкл бд
include 'vendor/autoload.php';

// Подкл к бд
$connection = new PDO('mysql:host=127.0.0.1;dbname=mysite', 'eugen', 'Fyufhcr123');

//Прокидываем данные в бд
function insert($db)
{
  $sqlIinsert = "INSERT `users`(`name`, `age`, `login`, `password`) VALUES(:name, :age, :login, :password)";
  $insert = $db->prepare($sqlIinsert);
  $insert->execute([
    'name' => 'Kek',
    'age' => 34,
    'login' => 'keker',
    'password' => 'djsnvckxv'
  ]);
}

//Удаляем данные с четным id
function delete($db)
{
  $sql = "DELETE FROM `users` WHERE `id_user` % 2 = 0";
  $db->query($sql);
}

// Получаем данные
$sql = 'SELECT * FROM `users`';
$result = $connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);

dump($result);