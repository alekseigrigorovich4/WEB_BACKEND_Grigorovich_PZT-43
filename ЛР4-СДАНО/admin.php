<?php
// Задание №3: защищённая страница (блок администратора)
session_start();

// Если не авторизован — отправляем на логин
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Проверка бездействия (15 минут = 900 секунд)
$timeout = 900;
if (time() - ($_SESSION['logged_at'] ?? 0) > $timeout) {
    session_destroy();
    header('Location: login.php');
    exit;
}

$_SESSION['logged_at'] = time();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Админ-панель</title>
</head>
<body>
    <h1>Добро пожаловать, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h1>
    <p>Это блок администратора.</p>
    <a href="logout.php">Выйти</a>
</body>
</html>