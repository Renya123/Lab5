<?php
$mysqli = new mysqli("localhost", "f0474563_Ren", "12345", "f0474563_students");
    if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к БД";
    }
require('tfpdf/tfpdf.php');
$pdf = new tFPDF();
$pdf->AddPage();
$pdf->SetMargins(5, 5, 5); 
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(190,10,'Студенты',0,1,'C');
$pdf->SetFillColor(255,255,255);
$pdf->SetFontSize(6);
$header = array("№ п/п","ФИО студента","Факультет","Группа","Номер зачетки","Дата сдачи зачета","Название предмета","Оценка","ФИО преподавателя");
$w = array(8,22,14,14,20,20,42,22,35);
$h = 6;
for ($c = 0; $c < 9; $c++){
    $pdf->Cell($w[$c],$h,$header[$c],'LRTB','0','',true);
}
$pdf->Ln();
$result = $mysqli->query("SELECT fio, faculty, gr, recordcard, datez, title, ocenka, fiot FROM test LEFT JOIN student ON student.student_id=test.id_student LEFT JOIN subject ON subject.subject_id=test.id_subject");
if ($result){
$counter = 1;
    while ($row = $result->fetch_row()){
    $pdf->Cell($w[0],$h,$counter,'LRBT','0','C',true);
    $pdf->Cell($w[1],$h,$row[0],'LRB');
    for ($c = 2; $c < 9; $c++){
		if ($c==5){
      $row[$c-1] = date('d-m-Y', strtotime($row[$c-1]));
       }
        $pdf->Cell($w[$c],$h,$row[$c-1],'RB');
     }
    $pdf->Ln();
    $counter++;
    }
}
$pdf->Output('Students.pdf','D');
exit();
?>
