<?php

function processTxtFile($filePath) {
    // Проверяем дату создания файла
    $threeMonthsAgo = strtotime('-3 months');
    $fileCreationTime = filectime($filePath);
    if ($fileCreationTime < $threeMonthsAgo) {
        return;
    }
    
    // Проверяем шаблон имени файла
    $fileName = basename($filePath);
    $pattern = '/-\p{Cyrillic}{2}\./u';
    if (!preg_match($pattern, $fileName)) {
        return;
    }
    
    // Читаем содержимое файла
    $contents = file_get_contents($filePath);
    
    // Проверяем содержимое на наличие нечетных английских символов в верхнем регистре
    if (!preg_match('/[A-Z]{1}[a-z]*[A-Z]{1}/', $contents)) {
        return;
    }
    
    // Изменяем содержимое файла
    $modifiedContents = preg_replace_callback('/[A-Za-z]/', function($matches) {
        static $count = 0;
        $count++;
        if ($count % 2 != 0) {
            return '$';
        } else {
            return $matches[0];
        }
    }, $contents);
    
    // Меняем название файла
    $newFileName = 'Change.txt';
    $newFilePath = dirname($filePath) . '/' . $newFileName;
    echo "Файл $filePath был успешно переименован.<br>";
    rename($filePath, $newFilePath);

    
    // Сохраняем изменения в файле
    file_put_contents($newFilePath, $modifiedContents);
}

function processDirectory($directory) {
    $files = scandir($directory);
    
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }
        
        $filePath = $directory . '/' . $file;
        
        if (is_dir($filePath)) {
            processDirectory($filePath);
        } elseif (is_file($filePath) && pathinfo($filePath, PATHINFO_EXTENSION) === 'txt') {
            processTxtFile($filePath);
        }
    }
}

$rootDirectory = './dir';
processDirectory($rootDirectory);

?>