<?php
// Задание 2: Обработка формы авторизации (POST)

$login = $_POST['username'] ?? '';
echo "Добро пожаловать, " . htmlspecialchars($login) . "!";
?> 