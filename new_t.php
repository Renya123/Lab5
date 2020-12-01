<html>
<head>
<meta charset = "utf-8">
<title> Добавление нового зачета</title> </head>
<body>
<H2>Регистрация:</H2>
<form action="save_new_t.php" metod="get">
Дата сдачи зачета: <input name="datez_n" type="date">
<br>id студента: <input name="id_student_n" size="100" type="text">
<br>id предмета: <input name="id_subject_n" size="100" type="text">
<br>Оценка: <input name="ocenka_n" size="100" type="text">
<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
<p>
<a href="index.php"> Вернуться к списку зачетов </a>
</body>
</html>