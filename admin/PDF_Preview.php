<?php
require('C:\xampp\htdocs\fpdf\fpdf.php');
require('C:\xampp\htdocs\cudho\include\connection.php');

class PDF extends FPDF{
    
    function Header()
    {
    $this->Image('C:\xampp\htdocs\cudho\img\cudhologo.png', 75, 10, 20);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(180,5,'City Urban Development and Housing Office',0,0,'C');
    $this->Ln();
    // Line break
    $this->SetFont('Arial', '', 10);
    $this->Cell(0, 5, $_POST['community'], 0, 0, 'C');
    $this->Ln();

    // Month Name
    $sdate = $_POST['startdate'];
    $edate = $_POST['enddate'];

    $startMonth = date('F', strtotime($sdate));
    $endMonth = date('F', strtotime($edate));

    $this->SetFont('Arial', '', 10);
    $this->Cell(0, 5, 'Period: ' . $startMonth . ' - ' . $endMonth, 0, 1, 'C');

    $this->Ln(10);

    $this->Image('C:\xampp\htdocs\cudho\img\starosalogo.png', 260, 10, 20);

    $col_widths = array(14, 75, 18, 35, 102, 53, 40);
    $col_names = array('Tag','Househead Name', 'Gender', 'Monthly Income', 'Community/Association', 'Occupation', 'Status');

    $this->SetFont('Arial','B',9);

    foreach ($col_names as $index => $col_name) {
        $this->Cell($col_widths[$index], 9.5, $col_name, 1, 0, 'C');
    }
    
    $this->Ln();
    }
    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
    
        // Calculate the width for each cell
        $cellWidth = $this->GetStringWidth('Organized By: '.$_POST['organizedby']) + $this->GetStringWidth('Prepared By: '.$_POST['preparedby']) + 20;
    
        // Position the cells accordingly
        $this->Cell($cellWidth / 2, 5, 'Organized By: '.$_POST['organizedby'], 0, 0, 'L');
        $this->SetX($this->GetX() + $cellWidth / 1.5);
        $this->Cell($cellWidth / 2, 5, 'Prepared By: '.$_POST['preparedby'], 0, 0, 'L');
    
        // Page number
        $this->Cell(0, 10, 'Page: '.$this->PageNo().'/{nb}', 0, 0, 'R');
    }
}

if (isset($_POST['startdate']) && isset($_POST['enddate']) && isset($_POST['address'])) {
    $db = new dbObj();
    $connString =  $db->getConnstring();

    $sdate = $_POST['startdate'];
    $edate = $_POST['enddate'];
    $address = $_POST['address'];
    $community = $_POST['community'];
    $startMonth = date('F', strtotime($sdate));
    $endMonth = date('F', strtotime($edate));
    $startYear = date('Y', strtotime($sdate));
    $endYear = date('Y', strtotime($edate));

    $result = mysqli_query($connString, "SELECT firstname, lastname, middlename, extension, community, tag, gender, occupation, monthIncome, tenurStatus FROM tbl_headinfo WHERE yearStay BETWEEN '$sdate' AND '$edate' AND barangay LIKE '%$address%'") or die("database error:". mysqli_error($connString));

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Create PDF using FPDF
    $pdf = new PDF('L','mm','legal');
    $pdf->AddPage();

    $pdf->AliasNbPages();
    $pdf->SetFont('Arial','',7);
    $col_widths = array(14, 75, 18, 35, 102, 53, 40);

    foreach ($data as $row) {
        $fullname = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']. ' ' . $row['extension'];
        
        if ($row['gender'] === 'Male') {
            $fullname .= ' ' . $row['extension'];
        } elseif ($row['gender'] === 'Female') {
            $fullname .= ' ' . $row['middlename'];
        }
        
        $pdf->Cell($col_widths[0], 7, $row['tag'], 1, 0, 'C');
        $pdf->Cell($col_widths[1],   7, $fullname, 1, 0, 'C'); // Modified line
        $pdf->Cell($col_widths[2], 7, $row['gender'], 1, 0, 'C');
        $pdf->Cell($col_widths[3], 7, $row['monthIncome'], 1, 0, 'C');
        $pdf->Cell($col_widths[4], 7, $row['community'], 1, 0, 'C');
        $pdf->Cell($col_widths[5], 7, $row['occupation'], 1, 0, 'C');
        $pdf->Cell($col_widths[6], 7, $row['tenurStatus'], 1, 0, 'C');
        $pdf->Ln();
    }
    

    // Output the PDF content
    ob_start();
    $pdf->Output();
    $pdfData = ob_get_clean();

    // Send the PDF data as the response
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . $community . $startMonth . $startYear .'-'. $endMonth . $endYear .'"');
    header('Content-Length: ' . strlen($pdfData));
    echo $pdfData;
}
?>