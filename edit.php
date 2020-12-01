<html>
<head>
<meta charset = "utf-8">
<title> Редактирование данных о студенте </title>
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
$x=$_GET["student_id"];
$saveus = "SELECT FIO, faculty, gr, recordcard, phone FROM student WHERE student_id =".$x;
$rows=mysqli_query($link, $saveus);
//'".$_GET['id_user']. "'"
// запрос на выборку сведений о пользователях
while ($st=mysqli_fetch_array($rows)){
$id=$x;
$FIO_e = $st['FIO'];
$faculty_e = $st['faculty'];
$gr_e = $st['gr'];
$recordcard_e = $st['recordcard'];
$phone_e = $st['phone'];
}
print "<form action='save_edit.php' metod='get'>";
//print "id: <input name='game_id_e' size='50' type='text'
//value='".$student_id_e."'>";
print "<br>ФИО: <input name='FIO_e' size='20' type='text'
value='".$FIO_e."'>";
print "<br>Факультет: <input name='faculty_e' size='20' type='text'
value='".$faculty_e."'>";
print "<br>Группа: <input name='gr_e' size='30' type='text'
value='".$gr_e."'>";
print "<br>Номер зачетки: <input name='recordcard_e' size='30' type='text'
value='".$recordcard_e."'>";
print "<br>Телефон: <input name='phone_e' size='30' type='text'
value='".$phone_e."'>";
print "<input type='hidden' name='student_id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку студентов </a>";
?>
</body>
</html>


