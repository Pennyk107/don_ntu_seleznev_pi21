<?php
error_reporting(E_ALL & ~E_DEPRECATED);

require_once('tcpdf/tcpdf.php');

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

$pdf->SetSubject('Lab6');
$pdf->SetCreator('seleznev Denis'); 
$pdf->SetAuthor('Seleznev Denis');
$pdf->SetTitle('Lab6');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->SetFont('dejavusans', '', 10, '', false);

$pdf->AddPage();


$pdf->writeHTMLCell(0, 0, '', '', 'Тема: Влияние социальных сетей на межличностные отношения', 0, 1, 0, true, 'L', true); // Выравнивание по левому краю
$pdf->writeHTMLCell(0, 0, '', '', 'Автор: Селезнёв Денис', 0, 1, 0, true, 'L', true); // Выравнивание по левому краю
$pdf->Image('1.jpg', 155, 15, 45, 0, 'JPG', '', '', true, 300, '', false, false, 0, false, false, false);


$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$message1 = "Социальные сети стали неотъемлемой частью современной жизни и оказывают значительное влияние на наши межличностные отношения. Они предоставляют нам возможность легко поддерживать связь с друзьями и родственниками, не зависимо от географического расстояния. Однако, зачастую мы замечаем, что чрезмерное использование социальных сетей может негативно повлиять на наши отношения в реальной жизни. Виртуальное общение может заместить личные встречи и разговоры лицом к лицу, что в конечном итоге может привести к ослаблению нашей эмоциональной связи с другими людьми.";
$pdf->SetFontSpacing(0.5); // Межсимвольный интервал = 1.5
$pdf->SetCellHeightRatio(2); // Межстрочное расстояние = 1
$pdf->writeHTMLCell(0, 0, '', '', $message1, 0, 1, 0, true, 'L', true); // Выравнивание по левому краю
$pdf->Ln();

$pdf->Image('2.jpg', 20, 150, 60, 0, 'JPG', '', '', true, 300, '', false, false, 0, false, false, false);
$pdf->Image('3.jpg', 130, 150, 60, 0, 'JPG', '', '', true, 300, '', false, false, 0, true, false, false);
$pdf->Rotate(3);
$message2 = "<p style='word-spacing: 500px'>Социальные сети имеют значительное влияние на наши межличностные отношения. Мы должны осознавать и контролировать время, проведенное в виртуальном мире, и стремиться к балансу между онлайн и офлайн общением. Важно помнить, что настоящие и качественные взаимоотношения строятся на личной встрече, открытости и взаимодействии в реальной жизни.

</p>";
$pdf->SetFontSpacing(0); // Межсимвольный интервал = 0
$pdf->SetCellHeightRatio(2); // Межстрочное расстояние = 2
$pdf->writeHTMLCell(0, 0, '', '', $message2, 0, 1, 0, true, 'R', true); // Выравнивание по правому краю
$pdf->Ln();



$pdf->SetCellHeightRatio(1); // Межстрочное расстояние = 1
$pdf->writeHTMLCell(0, 0, '', '', $message3, 0, 1, 0, true, 'R', true); // Выравнивание по правому краю
$pdf->Rotate(-5);



$pdf->Close();
$pdf->Output(__DIR__ . '/output.pdf', 'FI');
?>