<html>
<head>
<meta charset = "utf-8">
<title> Добавление нового студента</title> </head>
<body>
<H2>Регистрация:</H2>
<form action="save_new.php" metod="get">
ФИО: <input name="FIO_n" size="100" type="text">
<br>Факультет: <input name="faculty_n" size="100" type="text">
<br>Группа: <input name="gr_n" size="100" type="text">
<br>Номер зачётки: <input name="recordcard_n" size="100" type="text">
<br>Телефон: <input name="phone_n" size="100" type="text">
<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
<p>
<a href="index.php"> Вернуться к списку студентов </a>
</body>
</html>