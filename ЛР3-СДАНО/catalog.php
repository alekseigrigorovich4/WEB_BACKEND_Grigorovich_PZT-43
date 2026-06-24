<?php
// Задание 5: Фильтрация товаров через GET

$products = [
    ['name' => 'Ноутбук', 'category' => 'электроника', 'price' => 55000],
    ['name' => 'Книга PHP', 'category' => 'книги', 'price' => 1200],
    ['name' => 'Мышь', 'category' => 'электроника', 'price' => 1500],
    ['name' => 'Клавиатура', 'category' => 'электроника', 'price' => 2500],
    ['name' => 'Книга JS', 'category' => 'книги', 'price' => 1400],
    ['name' => 'Наушники', 'category' => 'аксессуары', 'price' => 3000],
];

$min = isset($_GET['min_price']) && $_GET['min_price'] !== '' ? (int)$_GET['min_price'] : null;
$max = isset($_GET['max_price']) && $_GET['max_price'] !== '' ? (int)$_GET['max_price'] : null;
$cat = isset($_GET['category']) && $_GET['category'] !== '' ? $_GET['category'] : null;

$filtered = [];
foreach ($products as $p) {
    if ($min !== null && $p['price'] < $min) continue;
    if ($max !== null && $p['price'] > $max) continue;
    if ($cat !== null && $p['category'] !== $cat) continue;
    $filtered[] = $p;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Каталог</title>
</head>
<body>

<form method="GET">
    Цена от: <input type="text" name="min_price" value="<?php echo $_GET['min_price'] ?? ''; ?>">
    до: <input type="text" name="max_price" value="<?php echo $_GET['max_price'] ?? ''; ?>">
    Категория:
    <select name="category">
        <option value="">Все</option>
        <option value="электроника">электроника</option>
        <option value="книги">книги</option>
        <option value="аксессуары">аксессуары</option>
    </select>
    <input type="submit" value="Фильтр">
</form>

<p>
    <a href="?min_price=1000">Товары дороже 1000</a> |
    <a href="?category=книги">Книги</a> |
    <a href="?">Сбросить</a>
</p>

<?php if (count($filtered) > 0): ?>
    <table border="1" cellpadding="5">
        <tr><th>Название</th><th>Категория</th><th>Цена</th></tr>
        <?php foreach ($filtered as $p): ?>
        <tr>
            <td><?php echo $p['name']; ?></td>
            <td><?php echo $p['category']; ?></td>
            <td><?php echo $p['price']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p style="color: red; font-weight: bold;">❌ Ничего не найдено. Попробуйте изменить параметры фильтра.</p>
<?php endif; ?>

</body>
</html>