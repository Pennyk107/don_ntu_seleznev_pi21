<?php
// Открываем файл для чтения
$file = fopen("Lab3IN.txt", "r");

// Открываем файл для записи результата
$outputFile = fopen("Lab3OUT.txt", "w");

// Читаем файл построчно
while (!feof($file)) {
    $line = fgets($file);
    
    // Разбиваем строку на слова
    $words = explode(" ", $line);
    
    // Проходим по каждому слову
    foreach ($words as &$word) {
        // Преобразуем слово в массив букв
        $letters = preg_split('//u', $word, -1, PREG_SPLIT_NO_EMPTY);
        
        // Проходим по каждой букве слова
        for ($i = 0; $i < count($letters); $i++) {
            // Заменяем нечетные буквы на нижний регистр
            if ($i % 2 == 0) {
                $letters[$i] = mb_strtolower($letters[$i], 'UTF-8');
            }
        }
        echo 'Все буквы заменены!';
        
        // Собираем слово из массива букв
        $word = implode('', $letters);
    }
    
    // Объединяем слова обратно в строку
    $newLine = implode(" ", $words);
    
    // Записываем обработанную строку в файл
    fwrite($outputFile, $newLine);
}

// Закрываем файлы
fclose($file);
fclose($outputFile);
?>