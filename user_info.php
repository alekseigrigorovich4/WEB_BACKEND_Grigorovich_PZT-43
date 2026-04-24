<?php
// Задание 1: Передача данных через адресную строку (GET-запрос)

if (isset($_GET['name']) && isset($_GET['city'])) {
    $name = $_GET['name'];
    $city = $_GET['city'];
    echo "Пользователь $name проживает в городе $city";
} else {
    echo "Данные не указаны. Пример: ?name=Иван&city=Минск";
}
?>