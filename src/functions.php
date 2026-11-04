<?php

function readingcsv ($pathcsv, $divide_by) 
{ 
$readcsv = '';
$readcsv = fopen( $pathcsv, 'r');
if ($readcsv == false) 
    {
        die ("Не удалось открыть файл: $pathcsv");
    }
$headers = fgetcsv($readcsv, 0, $divide_by, '"', "\\");

// удаление BOM и пробелов
$headers = array_map(fn($h) => trim(str_replace("\xEF\xBB\xBF", '', $h)), $headers);
$rows = [];


while (($rowscsv = fgetcsv($readcsv, 0, $divide_by, '"', "\\")) !== false)
    {
        $rows[] = $rowscsv;
    }
fclose($readcsv);
$result = [];
foreach ($rows as $row) {
    if (count($row) === count($headers)) {   // првоерка на отсутст-е в строке пустых значений
        $result[] =array_combine($headers, $row);
    }
}

return $result;
}

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}