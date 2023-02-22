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

$day_start = "28 เดือนกุมภาพันธ์ 2566"; // เริ่มลา
$day_end = "7 เดือนมีนาคม 2566"; // ลาถึง
$day_sum = "5"; // ลาทั้งหมด



$contact = "169 ถนนลงหาดบางแสง ตำบลแสนสุข อำเภอเมืองชลบุรี จังหวัดชลบุรี 20131";
$contact_out_area = "(ขออนุญาติออกนอกเขตจังหวัดสมุทรสาคร)";
//ในระหว่างลาติดต่อได้ที่
$tel = "098-2871857"; // เบอร์โทร

$username_instead = "นายฐิติพงศ์ จันทฤทธิ์"; // ชื่อผู้รับมอบหมายงานแทน
$username_instead_position = "นักวิชาการสาธารณสุข"; // ตำแหน่งผู้รับมอบหมายงานแทน


$username_director = "นางปรียานุช พลอยแก้ว"; 
$username_director_position = "ผู้อำนวยการ รพ.";

$username_head = "นางสาวสินิปภา หงษ์ภักดี"; //ผู้บัญชา
$username_head_position = "ผู้อำนวยการกองการเจ้าหน้าที่ "; // ตำแหน่งผู้บัญชา
$username_head_day = "๔ กุมภาพันธ์ ๒๕๖๖ ";
$comment_head = "อนุญาติให้ลาได้ตามความประสงค์ได้"; //ความเห็ยผู้บัญชา

// นายก
$checkbox_is_checked = true;
$username_president = "นายอุดม ไกรวัดนุสรณ์"; //นายก
$username_president_position = "นายกองค์กรณ์บริหารส่วนจังหวัดสมุทรสาคร "; // ตำแหน่งนายก
$username_president_day = "๔ กุมภาพันธ์ ๒๕๖๖ ";
$comment_president = "อนุญาติให้ลาได้ออกนอกต่างจังหวัดได้"; //ความเห็ยนายก

// username_check
$username_check = "นายจอม โหมเวียงจันทร์"; //ผู้ตรวจสอบ
$username_check_position = "รองนายกองค์กรณ์บริหารส่วนจังหวัดสมุทรสาคร "; // ตำแหน่งผู้ตรวจสอบ
// username_president


$leave_do = "10"; //ลามาแล้ว
$leave_now = "20"; //ลาครั้งนี้
$leave_sum = "30"; //ลารวม

$license_username = $image_data; // ลายเซ็นตนเอง
$license_username_instead = $image_data; // ลายเซ็นผู้รับมอบหมายงานแทน
$license_username_director = $image_data; // ลายเซ็นผู้อำนวยการ
$license_username_head = $image_data; // ลายเซ็นผู้บัญชา
$license_username_president = $image_data; // ลายเซ็นนายก
$license_username_check = $image_data; // ลายเซ็นผู้ตรวจสอบ



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

$pdf->MultiCell(0, 7, iconv('UTF-8', 'cp874', '           ข้าพเจ้า ' . $username . ' ตำแหน่ง' . $username_position . ' ฝ่าย' . $username_division . ' สังกัด' . $username_department . ' มีวันลาพักผ่อนสะสม ' . $cumulative_leave . ' วันทำการ มีสิทธิลาพักพ่อนประจำปีนี้ ' . $cool_leave_day . ' วันทำการ รวมเป็น ' . $cool_leave_day_sum . ' วันทำการ ขอลาพักพ่อนตั้งแต่วันที่ ' . $day_start . ' ถึงวันที่ ' . $day_end . ' มีกำหนด ' . $day_sum . ' วัน ในระหว่างลาติดต่อข้าพเจ้าได้ที่ ' . $contact . $contact_out_area . ' หมายเลขโทรศัพท์ ' . $tel . ''), 0, 'J');

$pdf->Ln();
$pdf->Ln();
$pdf->Cell(100, 6, iconv('UTF-8', 'cp874', 'ขออนุญาตมอบหมายงานในหน้าที่ให้ ' . $username_instead), 0, 0, 'L');
$pdf->Cell(10, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(50, 6, iconv('UTF-8', 'cp874', '(ลงชื่อ) '), 0, 0, 'L');
$pdf->Ln();
$pdf->Cell(100, 6, iconv('UTF-8', 'cp874', 'ตำแหน่ง' . $username_instead_position . ' ปฏิบัติหน้าที่แทน'), 0, 0, 'L');
$pdf->Cell(10, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(70, 6, iconv('UTF-8', 'cp874', '( ' . $username . ' ) '), 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(100, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(10, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(70, 6, iconv('UTF-8', 'cp874', $username_position), 0, 0, 'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(80, 6, iconv('UTF-8', 'cp874', '(ลงชื่อ)                             ผู้รับมอบ'), 0, 0, 'C');
$pdf->Ln();

$pdf->Cell(100, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(10, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(50, 6, iconv('UTF-8', 'cp874', '(ลงชื่อ) '), 0, 0, 'L');
$pdf->Ln();
$pdf->Cell(100, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(10, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(70, 6, iconv('UTF-8', 'cp874', '( ' . $username_director . ' ) '), 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(100, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(10, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(70, 6, iconv('UTF-8', 'cp874', $username_director_position), 0, 0, 'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(100, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->AddFont('THSarabunNew_b', '', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew_b', 'u', 16);
$pdf->Cell(10, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(70, 6, iconv('UTF-8', 'cp874', 'ความเห็นผู้บังคับบัญชา'), 0, 0, 'C');
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew', '', 16);
$pdf->Ln();
$pdf->Cell(100, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(10, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->MultiCell(70, 10, iconv('UTF-8', 'cp874', $comment_head), 0, 'L');
$pdf->Ln();

$pdf->Cell(100, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(10, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(50, 6, iconv('UTF-8', 'cp874', '(ลงชื่อ) '), 0, 0, 'L');
$pdf->Ln();
$pdf->Cell(100, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(10, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(70, 6, iconv('UTF-8', 'cp874', '( ' . $username_head . ' ) '), 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(100, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(10, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(70, 6, iconv('UTF-8', 'cp874', $username_head_position), 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(100, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(10, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(70, 6, iconv('UTF-8', 'cp874', $username_head_day), 0, 0, 'C');


$pdf->Ln();

$pdf->Cell(85, 8, iconv('UTF-8', 'cp874', '(ลงชื่อ)                             ผู้ตรวจสอบ'), 0, 0, 'C');

$pdf->AddFont('THSarabunNew_b', '', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew_b', 'u', 16);
$pdf->Cell(25, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(10, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(70, 10, iconv('UTF-8', 'cp874', 'คำสั่ง'), 0, 0, 'L');


$pdf->AddFont('THSarabunNew', '', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew', '', 16);
$pdf->Ln();
$pdf->Cell(80, 2, iconv('UTF-8', 'cp874', '(' . $username_check . ')'), 0, 0, 'C');
$pdf->Cell(30, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(10, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
// Checkbox width and height
$checkbox_width = 5;
$checkbox_height = 5;

// Checkbox border width
$border_width = 0.5;

// Draw the checkbox border

// If the checkbox is checked, draw a checkmark
if ($checkbox_is_checked) {
    $pdf->SetLineWidth(0.5);
    $pdf->Line($pdf->GetX() + 1, $pdf->GetY() + 2.5, $pdf->GetX() + 2.5, $pdf->GetY() + 4);
    $pdf->Line($pdf->GetX() + 2.5, $pdf->GetY() + 4, $pdf->GetX() + 4.5, $pdf->GetY() + 0.5);
}

$pdf->SetLineWidth($border_width);
$pdf->Rect($pdf->GetX(), $pdf->GetY(), $checkbox_width, $checkbox_height, 'D');
$pdf->Cell($checkbox_width + $border_width, $checkbox_height, '', 0, 0);
$pdf->Cell(20, $checkbox_height, iconv('UTF-8', 'cp874', 'อนุญาติ'));


// Checkbox width and height
$checkbox_width = 5;
$checkbox_height = 5;

// Checkbox border width
$border_width = 0.5;

// Draw the checkbox border
$pdf->SetLineWidth($border_width);
$pdf->Rect($pdf->GetX(), $pdf->GetY(), $checkbox_width, $checkbox_height, 'D');

if (!$checkbox_is_checked) {
    $pdf->SetLineWidth(0.5);
    $pdf->Line($pdf->GetX() + 1, $pdf->GetY() + 2.5, $pdf->GetX() + 2.5, $pdf->GetY() + 4);
    $pdf->Line($pdf->GetX() + 2.5, $pdf->GetY() + 4, $pdf->GetX() + 4.5, $pdf->GetY() + 0.5);
}

// Move the cursor to the right of the checkbox
$pdf->Cell($checkbox_width + $border_width, $checkbox_height, '', 0, 0);

// Add the label for the checkbox
$pdf->Cell(20, $checkbox_height, iconv('UTF-8', 'cp874', 'ไม่อนุญาติ'));


$pdf->Ln();
$pdf->Cell(80, 6, iconv('UTF-8', 'cp874', $username_check_position), 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(100, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(10, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(50, 6, iconv('UTF-8', 'cp874', $comment_president), 0, 0, 'L');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(100, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(10, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(50, 6, iconv('UTF-8', 'cp874', '(ลงชื่อ) '), 0, 0, 'L');
$pdf->Ln();
$pdf->Cell(100, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(10, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(70, 6, iconv('UTF-8', 'cp874', '( ' . $username_president . ' ) '), 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(100, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(10, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(70, 6, iconv('UTF-8', 'cp874', $username_president_position), 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(100, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(10, 6, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Cell(70, 6, iconv('UTF-8', 'cp874', $username_president_day), 0, 0, 'C');



// ลายเซ็นผู้รับมอบหมายงานแทน
$pdf->Image($license_username_instead, 40, 117, 30, 0, 'PNG');
// ลายเซ็นผู้รับมอบหมายงานแทน
$pdf->Image($license_username, 145, 92, 30, 0, 'PNG');
// ลายเซ็นผู้อำนวยการ
$pdf->Image($license_username_director, 145, 122, 30, 0, 'PNG');
// ลายเซ็นผู้อำนวยการ
$pdf->Image($license_username_head, 145, 172, 30, 0, 'PNG');
// ลายเซ็นนายก
$pdf->Image($license_username_president, 145, 236, 30, 0, 'PNG');
// ลายผู้ตรวจสอบ
$pdf->Image($license_username_check, 40, 198, 30, 0, 'PNG');


$pdf->SetXY(30, 152);
$pdf->MultiCell(60, 6, iconv('UTF-8', 'cp874', "สถิติการลาในปีงบประมาณ"), 0, 'C');

$pdf->AddFont('THSarabunNew_b', '', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew_b', '', 14);

$pdf->SetXY(30, 160);
$pdf->MultiCell(20, 8, iconv('UTF-8', 'cp874', "ลามาแล้ว \n (วันทำการ)"), 1, 'C');
$pdf->SetXY(50, 160);
$pdf->MultiCell(20, 8, iconv('UTF-8', 'cp874', "ลาครั้งนี้ \n (วันทำการ)"), 1, 'C');
$pdf->SetXY(70, 160);
$pdf->MultiCell(20, 8, iconv('UTF-8', 'cp874', "รวมเป็น \n (วันทำการ)"), 1, 'C');

$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->SetFont('THSarabunNew', '', 14);
$pdf->SetXY(30, 176);
$pdf->MultiCell(20, 10, iconv('UTF-8', 'cp874', $leave_do), 1, 'C');
$pdf->SetXY(50, 176);
$pdf->MultiCell(20, 10, iconv('UTF-8', 'cp874', $leave_now), 1, 'C');
$pdf->SetXY(70, 176);
$pdf->MultiCell(20, 10, iconv('UTF-8', 'cp874', $leave_sum), 1, 'C');



// แสดง PDF
$pdf->Output();
