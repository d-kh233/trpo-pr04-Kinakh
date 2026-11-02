<?php
$appVersion = '1.0.0';
$currentDate = date('d.m.Y H:i:s');

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    
</head>
<body>
    <p>Версия приложения: <?= htmlspecialchars($appVersion, ENT_QUOTES, 'UTF-8') ?></p>
    <p>Текущая дата и время: <?= htmlspecialchars($currentDate, ENT_QUOTES, 'UTF-8') ?></p>
</body>
</html>