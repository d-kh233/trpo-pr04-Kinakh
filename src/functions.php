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

function validateInput(array $input): array
{
    $errors = [];

    /* // 
    $length = preg_match_all($input['name']);
    if ($length < 2 || $length > 50) {
        $errors['name'] = 'Имя должно быть от 2 до 50 символов';
    }
        */
    // в имени разрешены только буквы кириллица и англ.яз., пробел и дефис
    if (preg_match('/[^а-яА-ЯёЁa-zA-Z\s\-]/u', $input['name'])) {
        $errors['name'] = 'Имя содержит недопустимые символы';
    }
    if (filter_var($input['email']) !== true) {
        $errors['email'] = 'Введите корректный email';
    }

    $experience = filter_var($input['experience'], FILTER_VALIDATE_INT, [
    'options' =>
     [
        'min_range' => 0,
        'max_range' => 50,  ],
        ]);

        if ($experience === false) {
            $errors['experience'] = 'Стаж — целое число от 0 до 50';
        }


    return $errors;
}


function readPOSTregistration(): array
{
    $name = trim($_POST['name'] ?? '');
    $department = trim($_POST['department'] ?? '');
    $experience = trim($_POST['experience'] ?? '');
    $email = trim($_POST['email'] ?? '');
    return [
       'name' => $name,
       'department' => $department,
       'experience' => $experience,
       'email' => $email,
    ];
}
