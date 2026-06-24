<?php
// Задание №3: форма авторизации
session_start();

// Если уже авторизован — отправляем в админку
if (isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $password = $_POST['password'] ?? '';

    // Простая проверка (логин: admin, пароль: 12345)
    if ($login === 'admin' && $password === '12345') {
        $_SESSION['user'] = $login;
        $_SESSION['logged_at'] = time();
        header('Location: admin.php');
        exit;
    } else {
        $error = 'Неверный логин или пароль';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Авторизация</title>
</head>
<body>
    <h2>Вход в админку</h2>
    <?php if ($error): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form method="POST">
        Логин: <input type="text" name="login" required><br>
        Пароль: <input type="password" name="password" required><br>
        <input type="submit" value="Войти">
    </form>
</body>
</html>