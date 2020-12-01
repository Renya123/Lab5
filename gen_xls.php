<?php
require_once('Classes/PHPExcel.php');
require_once('Classes/PHPExcel/Writer/Excel2007.php');
$mysqli = new mysqli("localhost", "f0474563_Ren", "12345", "f0474563_students");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к БД";
}
    $result = $mysqli->query("SELECT fio, faculty, gr, recordcard, datez, title, ocenka, fiot FROM test LEFT JOIN student ON student.student_id=test.id_student LEFT JOIN subject ON subject.subject_id=test.id_subject");
$xls = new PHPExcel();
$xls->setActiveSheetIndex(0);
$sheet = $xls->getActiveSheet();
$sheet->setTitle('Студенты');
$sheet->setCellValue("A1", 'Студенты');
$sheet->getStyle('A1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('#bfaace');
$sheet->mergeCells('A1:I1');
$sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$c = 0;
$header = array("№ п/п","ФИО студента","Факультет","Группа","Номер зачетки","Дата сдачи зачета","Название предмета","Оценка","ФИО преподавателя");
foreach ($header as $h){
    $sheet->setCellValueByColumnAndRow($c,2,$h);
    $sheet->getColumnDimensionByColumn($c)->setAutoSize(true);
    $c++;
    }
if ($result){
    $r = 3;
    while ($row = $result->fetch_row()){
    $c = 0;
    $sheet->setCellValueByColumnAndRow($c,$r,$r-2);
    $c++;
    foreach ($row as $cell){
    if ($c==5){
    $cell = date('d-m-Y', strtotime($cell));
    }
    $sheet->setCellValueByColumnAndRow($c,$r,$cell);
    $c++;
    }
    $r++;
    }
}
header('Content-Type: application/xls');
header('Content-Disposition: inline; filename=Students.xls');
header('Cache-Control: private, max-age=0, must-revalidate');
header('Pragma: public');
$objWriter = new PHPExcel_Writer_Excel5($xls);
$objWriter->save('php://output');
?>