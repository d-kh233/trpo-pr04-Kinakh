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
require_once __DIR__ . '\..\src\functions.php';

$result = readingcsv(__DIR__ . '/../dataset/employees.csv', ";");


?>

<form id = "signup" method="post" > 
    <h2> Регистрация </h2>
     <label for ="password"> Введите имя: 
                 <input type="text" name="name" >
            </label>
     <input   type="text" name="name" >
     <input  type="text" name="firstname">
     <input  type="text" name="lastname">
     <input  type="email" name="name" >
     <label for = "gender"> Пол: 
            <select method="post" id="gender">
                <option value="Female">Женский</option>
                <option value="Male">Мужской</option>
            </select>
            </label>

<label for = "submitbutton">
<button name="submitbutton" method="post" type="submit" > Отправить </button>
     </label>


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

                </main>
</section>
</body>
</html>