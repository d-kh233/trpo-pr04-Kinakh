<?php
$pathcsv = __DIR__ . '\..\dataset\employees.csv';

$readcsv = '';
$readcsv = fopen( $pathcsv, 'r');
if ($readcsv == false) 
    {
        die ("Не удалось открыть файл: $pathcsv");
    }
$headers = fgetcsv($readcsv, 0, ";", ";");
$rows = [];


while (($rowscsv = fgetcsv($readcsv, null, ";", ";")) !== false)
    {
        $rows[] = $rowscsv;
    }
fclose($readcsv);
echo "Заголовки:\n";
print_r($headers);

echo "Строки:\n";
print_r($rows);

?>