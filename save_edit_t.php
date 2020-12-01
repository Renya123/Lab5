<html>
<head> <meta charset = "utf-8"> </head>
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
$x=$_GET['test_id'];
$anotherquery = "UPDATE test SET datez='" . $_GET["datez_e"]
."', 	id_student='".$_GET["id_student_e"]."', id_subject='"
.$_GET["id_subject_e"]."', ocenka='".$_GET["ocenka_e"].
"' WHERE test_id =".$x;
mysqli_query($link, $anotherquery);
if (mysqli_affected_rows($link)>0) {
echo 'Все сохранено. <a href="index.php"> Вернуться к списку зачетов </a>'; }
else { echo 'Ошибка сохранения. <a href="index.php">
Вернуться к списку зачетов</a> '; }
?>
</body>
</html>