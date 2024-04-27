<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Содержимое файлов из архива</title>
</head>
<body>
  <h1>Содержимое файлов из архива</h1>
  
  <ul>
    <!-- Разархивируем файлы -->
    <?php
      $zip = new ZipArchive;
      $res = $zip->open('results.zip');
      if ($res === TRUE) {
        // Извлекаем все файлы из архива во временную директорию
        $zip->extractTo('temp');
        $zip->close();

        // Перебираем все файлы во временной директории
        $files = glob('temp/*.txt');
        foreach ($files as $file) {
          echo '<li>';
          echo '<h2>', basename($file), '</h2>';
          echo '<pre>', file_get_contents($file), '</pre>';
          echo '</li>';
        }

        // Удаляем временную директорию и ее содержимое
        array_map('unlink', glob('temp/*'));
        rmdir('temp');
      } else {
        echo 'Не удалось открыть архив.';
      }
    ?>
  </ul>
</body>
</html>