<?php
// Параметры для подкл бд
include 'vendor/autoload.php';
require_once 'settings.php';

// Подкл бд
$connection = new mysqli($host, $login, $password, $data);
if ($connection->connect_error)
  die('Error connection!');

// запрос данных
$query = "SELECT * FROM users";
$result = $connection->query($query);
if (!$result)
  die('Error select');

for ($i = 0; $i < $result->num_rows; ++$i) {
  $user = $result->fetch_assoc();
  echo "Name: " . $user['name'] . ', Age: ' . $user['age'] . '<br>';
}

dump($result->fetch_row());

$result->close();
$connection->close();