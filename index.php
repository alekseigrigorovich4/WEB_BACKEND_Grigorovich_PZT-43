<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа №2</title>
</head>
<body>

<?php
// Устанавливаем кодировку
mb_internal_encoding('UTF-8');
date_default_timezone_set('Europe/Minsk');

echo "<h1>Лабораторная работа №2</h1>";
echo "<hr>";

// ==================== 1. ТИПЫ ДАННЫХ ====================
echo "<h2>1. Типы данных</h2>";

$integerVar = 42;
$floatVar = 3.14159;
$stringVar = "100 рублей";
$boolVar = true;
$nullVar = null;

echo "integerVar = $integerVar, тип: " . gettype($integerVar) . "<br>";
echo "floatVar = $floatVar, тип: " . gettype($floatVar) . "<br>";
echo "stringVar = $stringVar, тип: " . gettype($stringVar) . "<br>";
echo "boolVar = " . ($boolVar ? 'true' : 'false') . ", тип: " . gettype($boolVar) . "<br>";
echo "nullVar = null, тип: " . gettype($nullVar) . "<br>";

echo "<br>Проверка isset(\$undefinedVar): " . (isset($undefinedVar) ? 'true' : 'false') . "<br>";

$tempFloat = 3.14159;
echo "floatVar до unset(): $tempFloat<br>";
unset($tempFloat);
echo "floatVar после unset(): " . (isset($tempFloat) ? $tempFloat : 'переменная удалена') . "<br>";

echo "<br>Приведение типов:<br>";
echo "(int)\$stringVar = " . (int)$stringVar . ", тип: " . gettype((int)$stringVar) . "<br>";
echo "\$stringVar + 0 = " . ($stringVar + 0) . ", тип: " . gettype($stringVar + 0) . "<br>";
echo "(string)\$floatVar = " . (string)$floatVar . ", тип: " . gettype((string)$floatVar) . "<br>";
echo "0 == false: " . (0 == false ? 'true' : 'false') . "<br>";
echo "0 === false: " . (0 === false ? 'true' : 'false') . "<br>";
echo "\"10 лет\" + 5 = " . ("10 лет" + 5) . "<br>";

// Константы
define("TAX_RATE", 0.2);
const COMPANY = "ООО «Ромашка»";
echo "<br>Константы:<br>";
echo "TAX_RATE = " . TAX_RATE . "<br>";
echo "COMPANY = " . COMPANY . "<br>";
echo "defined('TAX_RATE'): " . (defined('TAX_RATE') ? 'true' : 'false') . "<br>";
echo "__LINE__ = " . __LINE__ . "<br>";
echo "__FILE__ = " . __FILE__ . "<br>";

echo "<hr>";

// ==================== 2. ОПЕРАЦИИ PHP ====================
echo "<h2>2. Операции PHP</h2>";

$integerVar = 42;
$floatVar = 3.14159;
$name = "Иван Петров";
$age = 22;
$city = "Гродно";

echo "Арифметические операции:<br>";
echo "42 + 3.14159 = " . ($integerVar + $floatVar) . "<br>";
echo "42 % 7 = " . ($integerVar % 7) . "<br>";
echo "42 в степени 3 = " . pow($integerVar, 3) . "<br>";

echo "<br>Инкремент/декремент:<br>";
$counter = 5;
echo "Постфиксный counter++: " . ($counter++) . " (после: $counter)<br>";
$counter = 5;
echo "Префиксный ++counter: " . (++$counter) . " (после: $counter)<br>";

echo "<br>Строковые операции:<br>";
echo "Конкатенация: Имя: " . $name . ", возраст: " . $age . ", город: " . $city . "<br>";
$str = "Имя: $name";
$str .= ", возраст: $age";
echo "Составной оператор .= : $str<br>";

echo "<br>Операции сравнения:<br>";
echo "42 == \"100 рублей\": " . (42 == "100 рублей" ? 'true' : 'false') . "<br>";
echo "42 === \"100 рублей\": " . (42 === "100 рублей" ? 'true' : 'false') . "<br>";
echo "22 <=> 25 = " . (22 <=> 25) . "<br>";
echo "22 > 18 && город == \"Гродно\": " . (22 > 18 && $city == "Гродно" ? 'true' : 'false') . "<br>";

echo "<br>Приоритет операций:<br>";
echo "2 + 3 * 4 - 1 = " . (2 + 3 * 4 - 1) . "<br>";
echo "(2 + 3) * (4 - 1) = " . ((2 + 3) * (4 - 1)) . "<br>";

echo "<hr>";

// ==================== 3. ОПЕРАТОРЫ PHP ====================
echo "<h2>3. Операторы PHP</h2>";

$age = 22;
echo "Условный оператор if-elseif-else:<br>";
if ($age < 18) {
    echo "Возраст $age: ребёнок<br>";
} elseif ($age <= 35) {
    echo "Возраст $age: молодой<br>";
} elseif ($age <= 60) {
    echo "Возраст $age: взрослый<br>";
} else {
    echo "Возраст $age: пенсионер<br>";
}

echo "<br>Оператор switch (множественный выбор):<br>";
$dayOfWeek = date('N');
switch ($dayOfWeek) {
    case 1:
        echo "Сегодня понедельник, начало недели<br>";
        break;
    case 2:
        echo "Сегодня вторник<br>";
        break;
    case 3:
        echo "Сегодня среда<br>";
        break;
    case 4:
        echo "Сегодня четверг<br>";
        break;
    case 5:
        echo "Сегодня пятница, скоро выходные<br>";
        break;
    case 6:
        echo "Сегодня суббота<br>";
        break;
    case 7:
        echo "Сегодня воскресенье<br>";
        break;
    default:
        echo "Неизвестный день<br>";
}

echo "<br>Оператор match:<br>";
$category = match(true) {
    $age < 18 => "ребёнок",
    $age <= 35 => "молодой",
    $age <= 60 => "взрослый",
    default => "пенсионер"
};
echo "Возраст $age: $category<br>";

echo "<br>Тернарный оператор:<br>";
$boolVar = true;
$access = $boolVar ? "разрешён" : "запрещён";
echo "Доступ: $access<br>";

echo "<br>Циклы:<br>";
echo "while (1-10): ";
$i = 1;
while ($i <= 10) {
    echo $i++ . " ";
}
echo "<br>";

echo "do-while (1-10): ";
$i = 1;
do {
    echo $i++ . " ";
} while ($i <= 10);
echo "<br>";

echo "for (чётные 0-20): ";
for ($i = 0; $i <= 20; $i += 2) {
    echo $i . " ";
}
echo "<br>";

$fruits = ["яблоко", "банан", "апельсин"];
echo "foreach (\$fruits): ";
foreach ($fruits as $key => $value) {
    echo "[$key]=>$value ";
}
echo "<br>";

echo "foreach по ссылке (добавляем !): ";
foreach ($fruits as &$f) {
    $f .= "!";
}
echo implode(", ", $fruits) . "<br>";

echo "<br>Операторы передачи управления:<br>";
echo "continue (пропуск 5): ";
for ($i = 1; $i <= 10; $i++) {
    if ($i == 5) continue;
    echo $i . " ";
}
echo "<br>";

echo "break (остановка на 8): ";
for ($i = 1; $i <= 10; $i++) {
    if ($i == 8) break;
    echo $i . " ";
}
echo "<br>";

// ==================== ОПЕРАТОРЫ ВКЛЮЧЕНИЯ (реальное подключение) ====================
echo "<br>Операторы включения (include/require):<br>";
echo "include: ";
include 'config.php';
echo "SITE_NAME = " . SITE_NAME . "<br>";
echo "require_once: ";
require_once 'config.php';
echo "VERSION = " . VERSION . "<br>";
echo "AUTHOR = " . AUTHOR . "<br>";

echo "<hr>";

// ==================== 4. ПОЛЬЗОВАТЕЛЬСКИЕ ФУНКЦИИ ====================
echo "<h2>4. Пользовательские функции</h2>";

function greet($name) {
    return "Привет, $name!";
}
function calculateDiscount($price, $percent = 10) {
    return $price * (100 - $percent) / 100;
}
function sumAll(...$numbers) {
    return array_sum($numbers);
}
function divide($a, $b) {
    if ($b == 0) return null;
    return $a / $b;
}

echo "greet('Иван') = " . greet("Иван") . "<br>";
echo "calculateDiscount(1499.99, 15) = " . calculateDiscount(1499.99, 15) . "<br>";
echo "calculateDiscount(1499.99) = " . calculateDiscount(1499.99) . "<br>";
echo "sumAll(1,2,3,4,5) = " . sumAll(1,2,3,4,5) . "<br>";
echo "divide(10, 2) = " . divide(10,2) . "<br>";
echo "divide(10, 0) = " . (divide(10,0) === null ? 'null' : divide(10,0)) . "<br>";

echo "<br>Стрелочные функции:<br>";
$arr = [1,2,3,4,5];
$squares = array_map(fn($n) => $n * $n, $arr);
echo "Квадраты [1,2,3,4,5]: " . implode(", ", $squares) . "<br>";
$evens = array_filter($arr, fn($n) => $n % 2 == 0);
echo "Чётные числа: " . implode(", ", $evens) . "<br>";

echo "<hr>";

// ==================== 5. МАССИВЫ ====================
echo "<h2>5. Массивы</h2>";

// ИНДЕКСНЫЙ МАССИВ
echo "<h3>Индексный массив:</h3>";
$indexArray = ["Красный", "Синий", "Зелёный", "Жёлтый"];
echo "Исходный: ";
print_r($indexArray);
echo "<br>Первый элемент: " . $indexArray[0] . "<br>";
echo "Второй элемент: " . $indexArray[1] . "<br>";

// АССОЦИАТИВНЫЙ МАССИВ
echo "<h3>Ассоциативный массив:</h3>";
$capitals = [
    'Россия' => 'Москва',
    'Беларусь' => 'Минск',
    'Польша' => 'Варшава',
    'Германия' => 'Берлин'
];
foreach ($capitals as $country => $capital) {
    echo "Столица $country — $capital<br>";
}

// МНОГОМЕРНЫЙ МАССИВ
echo "<h3>Многомерный массив (студенты):</h3>";
$students = [
    ['name' => 'Анна', 'age' => 20, 'grade' => 4.5],
    ['name' => 'Иван', 'age' => 22, 'grade' => 3.8],
    ['name' => 'Мария', 'age' => 19, 'grade' => 4.9],
    ['name' => 'Петр', 'age' => 21, 'grade' => 4.1],
    ['name' => 'Елена', 'age' => 20, 'grade' => 4.7],
    ['name' => 'Алексей', 'age' => 23, 'grade' => 3.5]
];

echo "Таблица студентов:<br>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Имя</th><th>Возраст</th><th>Оценка</th></tr>";
foreach ($students as $student) {
    echo "<tr>";
    echo "<td>" . $student['name'] . "</td>";
    echo "<td>" . $student['age'] . "</td>";
    echo "<td>" . $student['grade'] . "</td>";
    echo "</tr>";
}
echo "</table><br>";

echo "Третий студент: " . $students[2]['name'] . "<br>";
echo "Возраст первого: " . $students[0]['age'] . "<br>";
echo "Оценка последнего: " . $students[5]['grade'] . "<br>";

// ОПЕРАЦИИ С МАССИВАМИ
$colors = ['red', 'green', 'blue', 'yellow', 'black', 'white'];

array_push($colors, 'purple');
echo "<br>Добавили purple: " . implode(", ", $colors) . "<br>";
$removed = array_shift($colors);
echo "Удалили первый элемент '$removed'<br>";

$capitals['Франция'] = 'Париж';
echo "Добавили Франция=>Париж<br>";

echo "<br>Перебор foreach:<br>";
echo "Имена студентов: ";
foreach ($students as $s) echo $s['name'] . " ";

echo "<br>Сортировка:<br>";
$colorsSort = $colors;
sort($colorsSort);
echo "sort() цветов: " . implode(", ", $colorsSort) . "<br>";

$studentsByAge = $students;
array_multisort(array_column($studentsByAge, 'age'), SORT_DESC, $studentsByAge);
echo "Студенты по возрасту (убывание): ";
foreach ($studentsByAge as $s) echo "{$s['name']}({$s['age']}) ";

echo "<br>ksort() стран: ";
$capitalsSort = $capitals;
ksort($capitalsSort);
foreach ($capitalsSort as $c => $v) echo "$c->$v ";

echo "<br><br>Функции поиска:<br>";
echo "in_array('orange'): " . (in_array('orange', $colors) ? 'есть' : 'нет') . "<br>";
echo "array_key_exists('grade'): " . (array_key_exists('grade', $students[0]) ? 'true' : 'false') . "<br>";

echo "<br>Функции высшего порядка:<br>";
$older = array_filter($students, fn($s) => $s['age'] >= 21);
echo "Студенты 21+: ";
foreach ($older as $s) echo "{$s['name']} ";
echo "<br>";

$formatted = array_map(fn($s) => "{$s['name']}({$s['age']}л)", $students);
echo "Форматированные имена: " . implode(", ", $formatted) . "<br>";

$avgGrade = array_reduce($students, fn($c,$s)=>$c+$s['grade'], 0) / count($students);
echo "Средний балл: " . round($avgGrade, 2) . "<br>";

echo "<hr>";

// ==================== 6. СТРОКОВЫЙ ТИП ДАННЫХ ====================
echo "<h2>6. Строковый тип данных</h2>";

$name = "Иван";
$text1 = " PHP (Hypertext Preprocessor) — это скриптовый язык ";
$text2 = "Я люблю PHP. PHP — это мощный язык. Я учу PHP.";
$userComment = "<b>Отличный сайт!</b> <script>alert('XSS');</script>";
$priceStr = " 1 234,56 руб. ";
$slugSource = "Привет, как дела?";
$csvLine = "Иванов;Иван;ivan@mail.com;29;Минск";

echo "Одинарные кавычки: 'Привет, $name!' -> " . 'Привет, $name!' . "<br>";
echo "Двойные кавычки: \"Привет, $name!\" -> " . "Привет, $name!" . "<br>";

$heredoc = <<<EOT
Heredoc: Привет, $name!
EOT;
echo "$heredoc<br>";

echo "<br>Длина строки:<br>";
echo "strlen() (байты): " . strlen($text1) . "<br>";
echo "mb_strlen() (символы): " . mb_strlen($text1) . "<br>";

echo "<br>Поиск подстроки:<br>";
echo "strpos('PHP'): " . strpos($text2, "PHP") . "<br>";
echo "str_contains('JavaScript'): " . (str_contains($text2, "JavaScript") ? 'true' : 'false') . "<br>";
echo "substr_count('PHP'): " . substr_count($text2, "PHP") . "<br>";

echo "<br>Замена и удаление пробелов:<br>";
echo "str_replace('PHP', 'PHP'): " . str_replace("PHP", "PHP", $text2) . "<br>";
echo "trim(): '{$priceStr}' -> '". trim($priceStr) . "'<br>";

echo "<br>Регистр и разбиение:<br>";
echo "mb_strtolower: " . mb_strtolower($slugSource) . "<br>";
echo "mb_strtoupper: " . mb_strtoupper($slugSource) . "<br>";
echo "mb_convert_case (первые заглавные): " . mb_convert_case($slugSource, MB_CASE_TITLE) . "<br>";
$csvArr = explode(';', $csvLine);
echo "explode(';'): ";
print_r($csvArr);
echo "<br>";

echo "<br>Безопасный вывод:<br>";
echo "htmlspecialchars: " . htmlspecialchars($userComment) . "<br>";
echo "strip_tags: " . strip_tags($userComment) . "<br>";

echo "<hr>";

// ==================== 7. МАТЕМАТИЧЕСКИЕ ФУНКЦИИ + ДАТА/ВРЕМЯ ====================
echo "<h2>7. Математические функции + дата/время</h2>";

echo "abs(-15) = " . abs(-15) . "<br>";
echo "ceil(4.7) = " . ceil(4.7) . "<br>";
echo "floor(4.7) = " . floor(4.7) . "<br>";
echo "round(3.14159, 2) = " . round(3.14159, 2) . "<br>";
echo "rand(1, 100) = " . rand(1, 100) . "<br>";
echo "max(34, 67, 12, 89) = " . max(34, 67, 12, 89) . "<br>";
echo "min(34, 67, 12, 89) = " . min(34, 67, 12, 89) . "<br>";

echo "<br>Дата и время:<br>";
echo "time() = " . time() . "<br>";
echo "date('d.m.Y H:i:s') = " . date("d.m.Y H:i:s") . "<br>";
echo "mktime(0,0,0,1,1,2026) = " . mktime(0,0,0,1,1,2026) . "<br>";
echo "strtotime('next monday') = " . date("Y-m-d", strtotime("next monday")) . "<br>";

$date = new DateTime("2025-04-10");
$date->modify('+2 weeks');
echo "2025-04-10 + 2 недели = " . $date->format('Y-m-d') . "<br>";

$diff = (new DateTime())->diff(new DateTime('2026-02-11'));
echo "Разница между 2026-02-11 и сегодня: " . $diff->days . " дней<br>";

echo "<hr>";
echo "<h3>Лабораторная работа №2 выполнена</h3>";
?>

</body>
</html>