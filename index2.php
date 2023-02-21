<?php
require('assets/vendor/libs/fpdf/fpdf.php');
include 'baseImg.php';

$pdf = new FPDF('P', 'mm', 'A4');

$addr_write = 'โรงพยาบาลส่งเสริมสุขภาพตำบลสายสี่'; //เขียนที่
$addr_write_date = "๔ กุมภาพันธ์ ๒๕๖๖"; //วันที่เขียน
$title = "ขอลาพักพ่อน"; // เรื่อง
$inform = "นายกองศ์การบริหารส่วนจังหวัดสมุทรสาคร"; // เรียน

$username = "นางสาวแพรวพรรณ เงินงาม";
$username_position = "แพทย์แผนไทย"; // ตำแหน่ง
$username_division = "โรงพยาบาลส่งเสริมสุขภาพตำบลสายสี่"; //ฝ่าย
$username_department = "กองสาธารณสุข"; //สังกัด

$cumulative_leave = (0 == 0) ? '-' : '0'; //วันลาสะสมปีก่อน
$cool_leave_day = '10'; //วันลาประจำปี
$cool_leave_day_sum = 0 + 10; //รวมวันลา

$day_start = "28 เดือนกุมภาพันธ์ พ.ศ. 2566"; // เริ่มลา
$day_end = "7 เดือนมีนาคม พ.ศ. 2566"; // ลาถึง
$day_sum = "5"; // ลาทั้งหมด

$contact = "169 ถนนลงหาดบางแสง ตำบลแสนสุข อำเภอเมืองชลบุรี จังหวัดชลบุรี 20131 (ขออนุญาติออกนอกเขตจังหวัดสมุทรสาคร)";
//ในระหว่างลาติดต่อได้ที่
$tel = "098-2871857"; // เบอร์โทร

$username_instead = "นายฐิติพงศ์ จันทฤทธิ์"; // ชื่อผู้รับมอบหมายงานแทน
$username_instead_position = "นักวิชาการสาธารณสุข"; // ตำแหน่งผู้รับมอบหมายงานแทน




$license_username = $image_data; // ลายเซ็นตนเอง
$license_username_instead = $image_data; // ลายเซ็นผู้รับมอบหมายงานแทน

for ($i=0; $i < 10; $i++) { 
  


$pdf->AddPage();
$pdf->SetMargins(15, 10);
$pdf->AddFont('THSarabunNew_b', '', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew_b', '', 18);
$pdf->MultiCell(0, 10, iconv('UTF-8', 'cp874', ''), 0, 1);
$pdf->MultiCell(0, 10, iconv('UTF-8', 'cp874', 'แบบบันทึกใบลาพักผ่อน'), 5, 'C');

$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->SetFont('THSarabunNew', '', 16);

$pdf->Cell(102, 6, iconv('UTF-8', 'cp874', ' '), 0, 0, 'L');
$pdf->Cell(15, 6, iconv('UTF-8', 'cp874', 'เขียนที่'), 0, 0, 'L');
$pdf->MultiCell(60, 6, iconv('UTF-8', 'cp874', $addr_write), 0, 'L');

$pdf->Cell(102, 6, iconv('UTF-8', 'cp874', ' '), 0, 0, 'L');
$pdf->Cell(15, 6, iconv('UTF-8', 'cp874', 'วันที่'), 0, 0, 'L');
$pdf->MultiCell(60, 6, iconv('UTF-8', 'cp874', $addr_write_date), 0, 'L');






$pdf->Cell(0, 8, iconv('UTF-8', 'cp874', 'เรื่อง     ' . $title), 0, 1, 'L');
$pdf->Cell(0, 9, iconv('UTF-8', 'cp874', 'เรียน     ' . $inform), 0, 1, 'L');

$pdf->MultiCell(0, 7, iconv('UTF-8', 'cp874', '           ข้าพเจ้า ' . $username . ' ตำแหน่ง' . $username_position . ' ฝ่าย' . $username_division . ' สังกัด' . $username_department . ' มีวันลาพักผ่อนสะสม ' . $cumulative_leave . ' วันทำการ มีสิทธิลาพักพ่อนประจำปีนี้ ' . $cool_leave_day . ' วันทำการ รวมเป็น ' . $cool_leave_day_sum . ' วันทำการ ขอลาพักพ่อนตั้งแต่วันที่ ' . $day_start . ' ถึงวันที่ ' . $day_end . ' มีกำหนด ' . $day_sum . ' วัน ในระหว่างลาติดต่อข้าพเจ้าได้ที่ ' . $contact . ' หมายเลขโทรศัพท์ ' . $tel . ''), 0, 'J');

$pdf->Ln();
$pdf->Ln();
$pdf->Cell(100, 6, iconv('UTF-8', 'cp874', 'ขออนุญาตมอบหมายงานในหน้าที่ให้ ' . $username_instead), 0, 0, 'L');
$pdf->Cell(50, 6, iconv('UTF-8', 'cp874', '(ลงชื่อ) '), 0, 0, 'L');
$pdf->Ln();
$pdf->Cell(100, 6, iconv('UTF-8', 'cp874', 'ตำแหน่ง' . $username_instead_position . ' ปฏิบัติหน้าที่แทน'), 0, 0, 'L');
$pdf->Cell(70, 6, iconv('UTF-8', 'cp874', '( ' . $username . ' ) '), 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(100, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(70, 6, iconv('UTF-8', 'cp874', $username_position), 0, 0, 'C');
$pdf->Ln();
$pdf->Ln();
$pdf->MultiCell(0, 6, iconv('UTF-8', 'cp874', '(ลงชื่อ)                                          ผู้รับมอบ'), 0, 1);

// ลายเซ็นผู้รับมอบหมายงานแทน
$pdf->Image($license_username_instead, 38, 119, 30, 0, 'PNG');

// ลายเซ็นผู้รับมอบหมายงานแทน
$pdf->Image($license_username, 135, 92, 30, 0, 'PNG');
}
// แสดง PDF
$pdf->Output();
