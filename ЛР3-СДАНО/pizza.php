<?php
// Задание 4: Форма заказа пиццы

$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $size = $_POST['size'] ?? '';
    $toppings = $_POST['toppings'] ?? [];
    $comment = $_POST['comment'] ?? '';
    $delivery = $_POST['delivery'] ?? '';

    $sizePrice = 0;
    if ($size == 'small') $sizePrice = 250;
    elseif ($size == 'medium') $sizePrice = 350;
    elseif ($size == 'large') $sizePrice = 450;

    $result .= "Размер: " . ($size ? "$size ($sizePrice руб.)" : "не выбран") . "<br>";
    $result .= "Топпинги: " . (count($toppings) ? implode(", ", $toppings) : "нет") . "<br>";
    $result .= "Комментарий: " . ($comment ?: "нет") . "<br>";
    $result .= "Доставка: " . ($delivery == 'pickup' ? "Самовывоз" : "Курьером") . "<br>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Заказ пиццы</title>
</head>
<body>
    <?php if ($result): ?>
        <div style="border:1px solid green; padding:10px; margin-bottom:20px;">
            <?php echo $result; ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <b>Размер:</b><br>
        <input type="radio" name="size" value="small" checked> Маленькая (250)<br>
        <input type="radio" name="size" value="medium"> Средняя (350)<br>
        <input type="radio" name="size" value="large"> Большая (450)<br><br>

        <b>Топпинги:</b><br>
        <input type="checkbox" name="toppings[]" value="сыр"> Сыр<br>
        <input type="checkbox" name="toppings[]" value="грибы"> Грибы<br>
        <input type="checkbox" name="toppings[]" value="колбаса"> Колбаса<br>
        <input type="checkbox" name="toppings[]" value="оливки"> Оливки<br><br>

        Комментарий:<br>
        <textarea name="comment" rows="3" cols="30"></textarea><br><br>

        Доставка:<br>
        <select name="delivery">
            <option value="pickup">Самовывоз</option>
            <option value="courier">Курьером</option>
        </select><br><br>

        <input type="submit" value="Заказать">
    </form>
</body>
</html>