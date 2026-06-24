<?php
// 1. СОЗДАНИЕ И ЗАПИСЬ
$file = "testfile.txt";
$fp = fopen($file, 'w') or die("Не удалось создать файл");
fwrite($fp, "Строка 1\nСтрока 2\nСтрока 3");
fclose($fp);
echo "Файл '$file' создан<br>";

// 2. ПРОВЕРКА СУЩЕСТВОВАНИЯ
if (file_exists($file)) echo "Файл существует<br>";

// 3. ЧТЕНИЕ ПОСТРОЧНО
$fp = fopen($file, 'r');
while (!feof($fp)) echo fgets($fp) . "<br>";
fclose($fp);

// 4. ЧТЕНИЕ ВСЕГО ФАЙЛА
echo file_get_contents($file) . "<br>";

// 5. ДОБАВЛЕНИЕ В КОНЕЦ
$fp = fopen($file, 'a');
fwrite($fp, "Добавленная строка\n");
fclose($fp);

// 6. БЛОКИРОВКА
$fp = fopen($file, 'r+');
flock($fp, LOCK_EX);
fwrite($fp, "Запись под блокировкой\n");
flock($fp, LOCK_UN);
fclose($fp);

// 7. КОПИРОВАНИЕ
copy($file, "copy_testfile.txt");

// 8. ПЕРЕИМЕНОВАНИЕ
rename("copy_testfile.txt", "renamed_file.txt");

// 9. УДАЛЕНИЕ
unlink("renamed_file.txt");

// 10. ИНФОРМАЦИЯ О ФАЙЛЕ
echo "Размер: " . filesize($file) . " байт<br>";
echo "Изменен: " . date("d.m.Y H:i:s", filemtime($file)) . "<br>";
?>