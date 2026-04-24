<?php
// Задание 3: Форма регистрации (POST)

$errors = [];
$name = $email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';

    if (empty($name)) $errors[] = "Имя обязательно";
    if (empty($email)) $errors[] = "Email обязателен";
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email некорректен";
    if (empty($password)) $errors[] = "Пароль обязателен";
    elseif (strlen($password) < 6) $errors[] = "Пароль должен быть не менее 6 символов";
    if ($password !== $confirm) $errors[] = "Пароли не совпадают";

    if (empty($errors)) {
        echo "<h3>Регистрация успешна!</h3>";
        echo "Имя: " . htmlspecialchars($name) . "<br>";
        echo "Email: " . htmlspecialchars($email);
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
</head>
<body>
    <?php if (!empty($errors)): ?>
        <div style="color:red;">
            <?php foreach ($errors as $err) echo "$err<br>"; ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        Имя: <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>"><br>
        Email: <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>
        Пароль: <input type="password" name="password"><br>
        Подтверждение: <input type="password" name="confirm_password"><br>
        <input type="submit" value="Зарегистрироваться">
    </form>
</body>
</html>