<html>

<head>

<meta charset = "utf-8">

<title> Редактирование данных о предмете </title>

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

$x=$_GET["subject_id"];

$saveus = "SELECT title, FIOT FROM subject WHERE subject_id =".$x;

$rows=mysqli_query($link, $saveus);

//'".$_GET['id_user']. "'"

// запрос на выборку сведений о пользователях

while ($st=mysqli_fetch_array($rows)){

$id=$x;

$title_e = $st['title'];

$FIOT_e = $st['FIOT'];

}

print "<form action='save_edit_s.php' metod='get'>";

print "<br>Название предмета: <input name='title_e' size='20' type='text'

value='".$title_e."'>";

print "<br>ФИО преподавателя: <input name='FIOT_e' size='20' type='text'

value='".$FIOT_e."'>";

print "<input type='hidden' name='subject_id' value='".$id."'> <br>";

print "<input type='submit' name='' value='Сохранить'>";

print "</form>";

print "<p><a href=\"index.php\"> Вернуться к списку предметов </a>";

?>

</body>

</html>
