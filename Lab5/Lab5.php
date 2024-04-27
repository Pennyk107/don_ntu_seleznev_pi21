<?php
// Путь к папке с графическими файлами фона
$backgroundsFolder = './';

// Получаем текущее значение счетчика из файла
$counterFile = 'counter.txt';
$counter = file_exists($counterFile) ? (int) file_get_contents($counterFile) : 0;

// Увеличиваем счетчик на 1
$counter++;
file_put_contents($counterFile, $counter);

// Получаем случайный фоновый файл из папки
$backgrounds = glob($backgroundsFolder . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
$randomBackground = $backgrounds[array_rand($backgrounds)];

// Создаем изображение с фоном
$image = imagecreatefromstring(file_get_contents($randomBackground));

// Задаем цвет текста
$textColor = imagecolorallocate($image, 255, 255, 255);

// Задаем размер шрифта в пикселях
$fontSize = 10000;

// Задаем стандартный шрифт
$font = 5; // Используем шрифт номер 5 (GD_STYLED)

// Рисуем текст с текущим значением счетчика
$text = 'Count Users: ' . $counter;
$textPositionX = 50;
$textPositionY = 50;

imagestring($image, $font, $textPositionX, $textPositionY, $text, $textColor);

// Отправляем заголовки для отображения изображения
header('Content-Type: image/png');

// Выводим изображение в формате PNG
imagepng($image);

// Освобождаем память
imagedestroy($image);
?>