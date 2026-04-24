<?php
// Задание №1: демонстрация работы сессий (счётчик просмотров)

session_start();

// Создаём счётчик, если его нет
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 1;
} else {
    $_SESSION['count']++;
}

echo "Вы обновили эту страницу " . $_SESSION['count'] . " раз(а)";
?>