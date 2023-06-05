<?php
require_once('tcpdf/tcpdf.php');
include 'conn.php';

if ($sensor = $_GET['sensor']){


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo2.png';
        $this->Image($image_file, 10, 5, 25, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', '', 8);
        // Title
        date_default_timezone_set('Asia/Calcutta');
        $tDate = date("F j, Y, g:i a");
        $html = '<p>W: www.xyma.in M: info@xyma.in</p>';
        $this->writeHTML($html, true, false, false, false, 'R');
        $this->Cell(160.5, 4, 'Report Generated on: '.$tDate, 0, 0, 'R', 0, '', 0, false, 'T', 'M');       
        
        // $html ='<hr>';
        // $html ='<hr>';
        // $this->writeHTML($html, true, false, false, false, ''); 
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }}
    

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('');
$pdf->SetSubject('');
$pdf->SetKeywords('');

$pdf->SetPrintHeader(true);
$pdf->SetPrintFooter(true); 


// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
// bg image properties
$pdf->AddPage();

$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);


// set bacground image
$img_file = K_PATH_IMAGES.'report.jpg';
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();
// ---------------------------------------------------------
//table starts from here
$pdf->AddPage();


$html = '<div style="text-align:center; line-height:60px;">PERSONAL INFORMATION</div><br/>';
$pdf->writeHTML($html, true, false, true, false, '');
$tbl = '<br><table border="1" cellpadding="8">
<tr>
<td style="padding: 10px">Name</td>
<td style="padding: 10px">Srinivasan</td>
</tr>
<tr>
<td>Email</td>
<td>srinivasanr.org.in</td>
</tr>
<tr>
<td>Customer Id</td>
<td>XYMA1337</td>
</tr>
<tr>
<td>Contact No</td>
<td>808-234-7584</td>
</tr>
</table><br/>';
$pdf->writeHTML($tbl, true, false, true, false, 'C');
// ---------------------------------------------------------
$html = '<div style="text-align:center; line-height:60px;">ASSET INFORMATION</div><br/>';
$pdf->writeHTML($html, true, false, true, false, '');
$tbl1 = '<br><table border="1" cellpadding="8">
<tr>
<th>Asset Type</th>
<th>Heater Pipe</th>
</tr>
<tr>
<td>Asset Location</td>
<td>Furnace</td>
</tr>
<tr>
<td>Total Sensors</td>
<td>8</td>
</tr>
<tr>
<td>Temperature Unit</td>
<td><span>&#176;</span>C</td>
</tr>
<tr>
<td>Report Generated On</td>
<td>Date to be inserted</td>
</tr>
</table><br/>';
$pdf->writeHTML($tbl1, true, false, true, false, 'C');


$txt = <<<EOD
DISCLAIMER
EOD;
$pdf->Write(80, $txt, '', 0, 'C', true, 0, false, false, 0);

$txt = <<<EOD
The information contained in these documents is confidential, privileged and only for the information of the intended recipient and may not be used, published or redistributed without the prior written consent of Xyma Analytics Pvt Ltd.
EOD;
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

$pdf->AddPage();

$html = '<table id="Table_id" border="2" cellpadding="8">';
$html .="
<tr>
<th><strong>S.no</strong></th>
<th><strong>Id</strong></th>
<th><strong>$sensor</strong></th>
<th><strong>timestamp</strong></th>

</tr>";

$sql = "SELECT sno, id, $sensor, timestamp FROM sensor";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        
    {
        $sno = $row["sno"];
        $id = $row["id"];
        $sensor_val = $row[$sensor];
        $timestamp = $row["timestamp"];

        $html .="
        <tr>
        <td>". $sno ."</td>
        <td>". $id ."</td>
        <td>". $sensor_val ."</td>
        <td>". $timestamp ."</td>
        </tr>";
    }
}
}


$html .= '</table>';

$pdf->writeHTML($html, true, false, true, false, '');


$pdf->AddPage('P');

$txt = <<<EOD
<---------------This Page is Intentionally Left Blank--------------->
EOD;
$pdf->Write(80, $txt, '', 0, 'C', true, 0, false, false, 0);

$txt = <<<EOD
DISCLAIMER
EOD;
$pdf->Write(40, $txt, '', 0, 'C', true, 0, false, false, 0);

$txt = <<<EOD
The information contained in these documents is confidential, privileged and only for the information of the intended recipient and may not be used, published or redistributed without the prior written consent of Xyma Analytics Pvt Ltd.
EOD;
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

$txt = <<<EOD
<---------------This Page is Intentionally Left Blank--------------->
EOD;
$pdf->Write(100, $txt, '', 0, 'C', true, 0, false, false, 0);

$pdf->Output('sensor_val.pdf', 'I');

}
else{

class MYPDF extends TCPDF {

//Page header
public function Header() {
    // Logo
    $image_file = K_PATH_IMAGES.'logo2.png';
    $this->Image($image_file, 10, 5, 25, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    // Set font
    $this->SetFont('helvetica', '', 8);
    // Title
    date_default_timezone_set('Asia/Calcutta');
    $tDate = date("F j, Y, g:i a");
    $html = '<p>W: www.xyma.in M: info@xyma.in</p>';
    $this->writeHTML($html, true, false, false, false, 'R');
    $this->Cell(160.5, 4, 'Report Generated on: '.$tDate, 0, 0, 'R', 0, '', 0, false, 'T', 'M');       
    
    // $html ='<hr>';
    // $html ='<hr>';
    // $this->writeHTML($html, true, false, false, false, ''); 
}

// Page footer
public function Footer() {
    // Position at 15 mm from bottom
    $this->SetY(-15);
    // Set font
    $this->SetFont('helvetica', 'I', 8);
    // Page number
    $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
}}


// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('');
$pdf->SetSubject('');
$pdf->SetKeywords('');


$pdf->SetPrintHeader(true); 

// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
require_once(dirname(__FILE__).'/lang/eng.php');
$pdf->setLanguageArray($l);
}

// bg image properties
$pdf->AddPage('P');

$pdf->SetPrintHeader(true);
$pdf->SetPrintFooter(true); 

$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);

// set bacground image
$img_file = K_PATH_IMAGES.'report.jpg';
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();
// ---------------------------------------------------------
//table starts from here
$pdf->AddPage('P');
$pdf->SetPrintHeader(true);
$pdf->SetPrintFooter(true); 

$html = '<div style="text-align:center; line-height:60px;">PERSONAL INFORMATION</div><br/>';
$pdf->writeHTML($html, true, false, true, false, '');
$tbl = '<br><table border="1" cellpadding="8">
<tr>
<td style="padding: 10px">Name</td>
<td style="padding: 10px">Srinivasan</td>
</tr>
<tr>
<td>Email</td>
<td>srinivasanr.org.in</td>
</tr>
<tr>
<td>Customer Id</td>
<td>XYMA1337</td>
</tr>
<tr>
<td>Contact No</td>
<td>808-234-7584</td>
</tr>
</table><br/>';
$pdf->writeHTML($tbl, true, false, true, false, 'C');
// ---------------------------------------------------------
$html = '<div style="text-align:center; line-height:60px;">ASSET INFORMATION</div><br/>';
$pdf->writeHTML($html, true, false, true, false, '');
$tbl1 = '<br><table border="1" cellpadding="8">
<tr>
<th>Asset Type</th>
<th>Heater Pipe</th>
</tr>
<tr>
<td>Asset Location</td>
<td>Furnace</td>
</tr>
<tr>
<td>Total Sensors</td>
<td>8</td>
</tr>
<tr>
<td>Temperature Unit</td>
<td><span>&#176;</span>C</td>
</tr>
<tr>
<td>Report Generated On</td>
<td>Date to be inserted</td>
</tr>
</table><br/>';
$pdf->writeHTML($tbl1, true, false, true, false, 'C');


$txt = <<<EOD
DISCLAIMER
EOD;
$pdf->Write(80, $txt, '', 0, 'C', true, 0, false, false, 0);

$txt = <<<EOD
The information contained in these documents is confidential, privileged and only for the information of the intended recipient and may not be used, published or redistributed without the prior written consent of Xyma Analytics Pvt Ltd.
EOD;
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

$pdf->AddPage('L');

$html = '<table id="Table_id" border="2" cellpadding="8">';
$html .="
<tr>
<th><strong>S.no</strong></th>
<th><strong>Id</strong></th>
<th><strong>sensor1</strong></th>
<th><strong>sample</strong></th>
<th><strong>sensor2</strong></th>
<th><strong>sample1</strong></th>
<th><strong>sensor3</strong></th>
<th><strong>sample2</strong></th>
<th><strong>timestamp</strong></th>

</tr>";

$sql = "SELECT sno, id, sensor1, sample, sensor2, sample1, sensor3, sample2, timestamp FROM sensor";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {

    
{
    $sno = $row["sno"];
    $id = $row["id"];
    $sensor1 = $row["sensor1"];
    $sample = $row["sample"];
    $sensor2 = $row["sensor2"];
    $sample1 = $row["sample1"];
    $sensor3 = $row["sensor3"];
    $sample2 = $row["sample2"];
    $timestamp = $row["timestamp"];

    $html .="
    <tr>
    <td>". $sno ."</td>
    <td>". $id ."</td>
    <td>". $sensor1 ."</td>
    <td>". $sample ."</td>
    <td>". $sensor2 ."</td>
    <td>". $sample1 ."</td>
    <td>". $sensor3 ."</td>
    <td>". $sample2 ."</td>
    <td>". $timestamp ."</td>
    </tr>";
}
}
}

$html .= '</table>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->AddPage('P');

$txt = <<<EOD
<---------------This Page is Intentionally Left Blank--------------->
EOD;
$pdf->Write(80, $txt, '', 0, 'C', true, 0, false, false, 0);

$txt = <<<EOD
DISCLAIMER
EOD;
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

$txt = <<<EOD
The information contained in these documents is confidential, privileged and only for the information of the intended recipient and may not be used, published or redistributed without the prior written consent of Xyma Analytics Pvt Ltd.
EOD;
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

$txt = <<<EOD
<---------------This Page is Intentionally Left Blank--------------->
EOD;
$pdf->Write(60, $txt, '', 0, 'C', true, 0, false, false, 0);

$pdf->Output('ST1.pdf', 'I');

}
?>