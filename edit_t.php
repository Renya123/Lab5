<html>
<head>
<meta charset = "utf-8">
<title> Редактирование данных о зачетной ведомости </title>
</head>
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
mysqli_select_db($link, "f0474563_f0474563_students");
$x=$_GET["test_id"];
$saveus = "SELECT datez, id_student, id_subject, ocenka FROM test WHERE test_id =".$x;
$rows=mysqli_query($link, $saveus);
//'".$_GET['id_user']. "'"
// запрос на выборку сведений о пользователях
while ($st=mysqli_fetch_array($rows)){
$id=$x;
$datez_e = $st['datez'];
$id_student_e = $st['id_student'];
$id_subject_e = $st['id_subject'];
$ocenka_e = $st['ocenka'];
}
print "<form action='save_edit_t.php' metod='get'>";
//print "id: <input name='game_id_e' size='50' type='text'
//value='".$student_id_e."'>";
print "<br>Дата сдачи зачета: <input name='datez_e' type='date'
value='".$datez_e."'>";
print "<br>id студента: <input name='id_student_e' size='20' type='text'
value='".$id_student_e."'>";
print "<br>id предмета: <input name='id_subject_e' size='30' type='text'
value='".$id_subject_e."'>";
print "<br>Оценка: <input name='ocenka_e' size='30' type='text'
value='".$ocenka_e."'>";
print "<input type='hidden' name='test_id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку зачетной ведомости </a>";
?>
</body>
</html>


