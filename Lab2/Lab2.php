<?php
$filename = 'Lab2IN.txt';
$file_content = file_get_contents($filename);

$max_nested_for = 0;
$current_nested_for = 0;

$lines = explode("\n", $file_content);

foreach ($lines as $line) {
    // Удаляем комментарии
    $line = preg_replace('/\/\/.*$/', '', $line);

    // Подсчитываем открывающие и закрывающие скобки
    $open_brackets = substr_count($line, '{');
    $close_brackets = substr_count($line, '}');

    // Обновляем текущий уровень вложенности
    $current_nested_for += $open_brackets - $close_brackets;

    // Обновляем максимальное количество вложенных операторов for
    if (strpos($line, 'for') !== false && $current_nested_for > $max_nested_for) {
        $max_nested_for = $current_nested_for;
    }
}

echo "Максимальное количество вложенных операторов for: " . $max_nested_for;
?>