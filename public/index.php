<?php
require_once __DIR__ . '\..\src\functions.php';
$input = [];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = readPOSTregistration();
    $errors = validateInput($input);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Список сотрудников</title>

    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<main>
<?php
$appVersion = ' 1.0.0 ';
$currentDate = date(' d.m.Y H:i:s ');
echo( "Версия приложения $appVersion <br>");
echo( "Дата  $currentDate <br>");


$result = readingcsv(__DIR__ . '/../dataset/employees.csv', ";");


?>
    <a href="#employeeslist">Перейти к списку</a>


<form id="signup" method="post" action="">
    <h2>Регистрация</h2>

    <label for="name">Введите имя:</label>
    <input type="text" id="name" name="name" value="<?= e($input['name'] ?? '') ?>">

    <label for="department">Отдел:</label>
    <input type="text" id="department" name="department" value="<?= e($input['department'] ?? '')  ?>">

    <label for="experience">Стаж:</label>
    <input type="number" id="experience" name="experience" min="0" value="<?=e($input['experience'] ?? '') ?>">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?= e($input['email'] ?? '') ?>">

    <button type="submit">Отправить</button>


<!--
<label for = "gender"> Пол: 
            <select id="gender">
                <option value="Female">Женский</option>
                <option value="Male">Мужской</option>
            </select>
            </label> 
-->

</form>
<section id = "employeeslist">
    <h1> Список сотрудников </h1>
    <?php if (((count ($result) )) == 0 ): ?>
        <p > Нет записей для выбранного отдела </p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th> 
                    <th>ФИО</th>
                    <th>Отдел</th>
                    <th>Стаж</th>
                    <th>email</th>
                
                
                    </tr>
        

            </thead> 
            <tbody> 
                <?php foreach ($result as $row): ?>
                    <tr>
                         <td> <?php echo e($row['id']) ?> </td>
                         <td> <?php echo e($row['name']) ?> </td>
                         <td> <?php echo e($row['department']) ?> </td>
                         <td> <?php echo e($row['experience']) ?> </td>
                         <td> <?php echo e($row['email']) ?> </td>
                     
                </tr>
                <?php endforeach; ?>

    </tbody>



    </table>
<?php endif; ?>

                
</section>
</main>
</body>
</html>