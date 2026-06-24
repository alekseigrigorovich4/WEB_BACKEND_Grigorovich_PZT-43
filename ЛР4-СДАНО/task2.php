<?php
// Задание №2: демонстрация работы cookies

// Устанавливаем cookie, если его нет
if (!isset($_COOKIE['visit_count'])) {
    setcookie('visit_count', 1, time() + 86400 * 30); // на 30 дней
    $count = 1;
} else {
    $count = $_COOKIE['visit_count'] + 1;
    setcookie('visit_count', $count, time() + 86400 * 30);
}

echo "Вы посетили этот сайт $count раз(а)";
?>