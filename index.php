<html>
<head>
<meta charset = "utf-8">
<title> Сведения о студентах </title> </head>
<body>
<?php
$link = mysqli_connect("127.0.0.1", "f0474563_Ren", "12345", "f0474563_students");
mysqli_query($link, 'SET NAMES utf-8');
if (!$link) {
echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
exit;
}
// подключение к базе данных:
mysqli_select_db($link, "f0474563_students");

?>

<h2>Студенты:</h2>
<table border="1">
<tr>
<th> id </th> <th> ФИО </th> <th> Факультет </th> <th> Группа </th> <th> Номер зачетки </th> <th> Телефон </th>
<th> Редактировать </th> <th> Удалить </th> </tr>
<?php
$result=mysqli_query($link, "SELECT student_id, FIO, faculty, gr, recordcard, phone FROM student"); // запрос на выборку сведений о пользователях
while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
echo "<tr>";
echo "<td>" . $row['student_id'] . "</td>";
echo "<td>" . $row['FIO'] . "</td>";
echo "<td>" . $row['faculty'] . "</td>";
echo "<td>" . $row['gr'] . "</td>";
echo "<td>" . $row['recordcard'] . "</td>";
echo "<td>" . $row['phone'] . "</td>";
echo "<td><a href='edit.php?student_id=" . $row['student_id']
. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
echo "<td><a href='delete.php?student_id=" . $row['student_id']
. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего студентов: $num_rows </p>");
?>
<p> <a href="new.php"> Добавить студента </a>


<h2>Предметы:</h2>
<table border="1">
<tr>
<th> id </th> <th> Название предмета </th> <th> ФИО преподавателя </th> 
<th> Редактировать </th> <th> Удалить </th> </tr>
<?php
$result=mysqli_query($link, "SELECT subject_id, title, FIOT FROM subject"); // запрос на выборку сведений о пользователях
while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
echo "<tr>";
echo "<td>" . $row['subject_id'] . "</td>";
echo "<td>" . $row['title'] . "</td>";
echo "<td>" . $row['FIOT'] . "</td>";
echo "<td><a href='edit_s.php?subject_id=" . $row['subject_id']
. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
echo "<td><a href='delete_s.php?subject_id=" . $row['subject_id']
. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего предметов: $num_rows </p>");
?>
<p> <a href="new_s.php"> Добавить предмет </a>


<h2>Зачетная ведомость:</h2>
<table border="1">
<tr>
<th> id </th> <th> Дата сдачи зачета </th> <th> id студента </th> 
<th>  id предмета </th> <th>  Оценка </th> <th>  Редактировать </th> <th> Удалить </th> </tr>
<?php
$result=mysqli_query($link, "SELECT test_id, datez, id_student, id_subject, ocenka FROM test"); // запрос на выборку сведений о пользователях
while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
echo "<tr>";
echo "<td>" . $row['test_id'] . "</td>";
echo "<td>" . date('d-m-Y', strtotime($row['datez'])) . "</td>";
echo "<td>" . $row['id_student'] . "</td>";
echo "<td>" . $row['id_subject'] . "</td>";
echo "<td>" . $row['ocenka'] . "</td>";
echo "<td><a href='edit_t.php?test_id=" . $row['test_id']
. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
echo "<td><a href='delete_t.php?test_id=" . $row['test_id']
. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего зачетов: $num_rows </p>");
?>
<p> <a href="new_t.php"> Добавить зачет </a>

<p> <a href="gen_pdf.php"> Сгенерировать PDF файл </a>

<p> <a href="gen_xls.php"> Сгенерировать XLS файл </a>
</body>
</html>