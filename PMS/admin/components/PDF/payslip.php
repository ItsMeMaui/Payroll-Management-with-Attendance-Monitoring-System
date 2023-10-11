<?php
$dbServername = "Localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "pmswa";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (isset($_POST['generateSpecificReport'])) {
    require("../../fpdf/fpdf.php");
	$pdf = new FPDF();
	$pdf->AddPage();
	$start = $_POST['start'];
    $end = $_POST['end'];
    $user = $_POST['selecteduser'];


	$select = "SELECT 
	    e.emp_id,
	    UPPER(e.emp_fname) AS emp_fname,
	    UPPER(e.emp_mname) AS emp_mname,
	    UPPER(e.emp_lname) AS emp_lname,
	    DATE_FORMAT(e.emp_dateofbirth, '%m/%d/%Y') AS formatted_dob,
	    UPPER(r.role_name) AS role_name,
	    r.role_rate_per_hour,
	    DATE_FORMAT(a.attendance_date, '%m/%d/%Y') AS formatted_attendance_date,
	    SUM(a.attendance_hour) AS total_hours,
	    ROUND(SUM(a.attendance_hour * r.role_rate_per_hour), 2) AS total_salary,
	    UPPER(DATE_FORMAT(CURDATE(), '%M %Y')) AS formatted_payperiod
	FROM
	    tbl_attendances a
	JOIN
	    tbl_employees e ON a.emp_id = e.emp_id
	JOIN
	    tbl_roles r ON e.role_id = r.role_id
	WHERE
	    DATE_FORMAT(a.attendance_date, '%m/%d/%Y') BETWEEN '$start' AND '$end' AND e.emp_id = '$user' and e.emp_status = 'Active'
	GROUP BY
	    e.emp_id, emp_fname, emp_mname, emp_lname, e.emp_dateofbirth, role_name, r.role_rate_per_hour;
	;
	";
    $result = mysqli_query($conn, $select);

	function addHeader($pdf) {
	    $pdf->SetFont('Arial', 'B', 16);
	    $pdf->Cell(0, 20, 'MRF REALTY AND SERVICES', 0, 1, 'C');
	    $pdf->SetFont('Arial', '', 12);
	    $pdf->Cell(0, 0, 'General Santos City', 0, 1, 'C');
	    $pdf->Ln(20);
	}

	if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_object()) {
	        $user_id = $row->emp_id;
	        $emp_fname = $row->emp_fname;
	        $emp_lname = $row->emp_lname;
	        $emp_mname = $row->emp_mname;
	        $emp_dateofbirth = $row->formatted_dob;
	        $role_name = $row->role_name;
	       	$formatted_attendance_date = $row->formatted_attendance_date; // Fetch the formatted date
	       	$formatted_payperiod = $row->formatted_payperiod; // Fetch the formatted date
	        $total_salary = $row->total_salary;
	        $total_hours = $row->total_hours;
		    addHeader($pdf);
		    $pdf->Image('../../images/mrflogo.png', 25, $pdf->GetY() - 45, 35);
		    $pdf->SetFont('Arial', 'B', 10); // Set the label text to be bold

		    $pdf->Cell(95, 10, 'FIRSTNAME: ' .$emp_fname.' '.$emp_mname.' ' .$emp_lname.'', 1, 0);
		    $pdf->Cell(50, 10, 'DATE OF BIRTH: ' .$emp_dateofbirth.'', 1, 0);
		    $pdf->Cell(45, 10, 'POSITION: ' .$role_name.'', 1, 1);
		    
		    $pdf->Cell(47, 10, 'START DATE: ' .$start.'', 1, 0);
		    $pdf->Cell(48, 10, 'END DATE: ' .$end.'', 1, 0);
		    $pdf->Cell(40, 10, 'TOTAL HOURS: ' .$total_hours.'', 1, 0);
		    $pdf->Cell(55, 10, 'PAY PERIOD: ' .$formatted_payperiod.'', 1, 1);
		    
		    $pdf->SetFont('Arial', 'B', 10); 

		    $pdf->Cell(95, 10, 'EARNINGS', 1, 0, 'C');
		    $pdf->Cell(95, 10, 'DEDUCTIONS', 1, 1, 'C');

		    $pdf->SetFont('Arial', '', 10); 

		    $pdf->MultiCell(95, 10, 'BASIC SALARY: P '.$total_salary."\n".'ALLOWANCE: _______________', 'LRTB', false);

		    $nextX = $pdf->GetX() + 95;
		    $nextY = $pdf->GetY() - 20;
		    $pdf->SetXY($nextX, $nextY);
		    $pdf->MultiCell(95, 10, 'SSS: _______________'."\n".'PHILHEALTH: _______________', 'LTRB', false);

		    $pdf->SetFont('Arial', 'B', 10); 

		    $nextX = $pdf->GetX();
		    $nextY = $pdf->GetY();
		    $pdf->SetXY($nextX, $nextY);
		    $pdf->Cell(95, 10, 'TOTAL EARNINGS: _______________', 1, 0, 'C');
		    $pdf->Cell(95, 10, 'TOTAL DEDUCTIONS: _______________', 1, 1, 'C');

		    $nextX = $pdf->GetX();
		    $nextY = $pdf->GetY();
		    $pdf->SetXY($nextX, $nextY);
		    $pdf->Cell(0, 10, 'TOTAL SALARY: _______________', 1, 1, 'C');

		    // $nextX = $pdf->GetX();
		    // $nextY = $pdf->GetY() + 25;
		    // $pdf->SetXY($nextX, $nextY);
		    // addBrokenLine($pdf, 190);
		    // $pdf->Ln(20); 
			$pdf->Output();

        }
    }

}
if (isset($_POST['generateBC'])) {
	require("../../fpdf/fpdf.php");
		$pdf = new FPDF();
		$pdf->AddPage();
		$start = $_POST['start'];
	    $end = $_POST['end'];


	$select = "SELECT 
	    e.emp_id,
	    UPPER(e.emp_fname) AS emp_fname,
	    UPPER(e.emp_mname) AS emp_mname,
	    UPPER(e.emp_lname) AS emp_lname,
	    DATE_FORMAT(e.emp_dateofbirth, '%m/%d/%Y') AS formatted_dob,
	    UPPER(r.role_name) AS role_name,
	    r.role_rate_per_hour,
	    DATE_FORMAT(a.attendance_date, '%m/%d/%Y') AS formatted_attendance_date,
	    SUM(a.attendance_hour) AS total_hours,
	    ROUND(SUM(a.attendance_hour * r.role_rate_per_hour), 2) AS total_salary,
	    UPPER(DATE_FORMAT(CURDATE(), '%M %Y')) AS formatted_payperiod
	FROM
	    tbl_attendances a
	JOIN
	    tbl_employees e ON a.emp_id = e.emp_id
	JOIN
	    tbl_roles r ON e.role_id = r.role_id
	WHERE
	    DATE_FORMAT(a.attendance_date, '%m/%d/%Y') BETWEEN '$start' AND '$end' and e.emp_status = 'Active'
	GROUP BY
	    e.emp_id, emp_fname, emp_mname, emp_lname, e.emp_dateofbirth, role_name, r.role_rate_per_hour;
	;
	";
	    $result = mysqli_query($conn, $select);

	function addHeader($pdf) {
	    $pdf->SetFont('Arial', 'B', 16);
	    $pdf->Cell(0, 20, 'MRF REALTY AND SERVICES', 0, 1, 'C');
	    $pdf->SetFont('Arial', '', 12);
	    $pdf->Cell(0, 0, 'General Santos City', 0, 1, 'C');
	    $pdf->Ln(20);
	}
	function addBrokenLine($pdf, $length) {
	    $currentX = $pdf->GetX();
	    $currentY = $pdf->GetY();
	    $pdf->Line($currentX, $currentY, $currentX + $length, $currentY);
	}

	if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_object()) {
	        $user_id = $row->emp_id;
	        $emp_fname = $row->emp_fname;
	        $emp_lname = $row->emp_lname;
	        $emp_mname = $row->emp_mname;
	        $emp_dateofbirth = $row->formatted_dob;
	        $role_name = $row->role_name;
	       	$formatted_attendance_date = $row->formatted_attendance_date; // Fetch the formatted date
	       	$formatted_payperiod = $row->formatted_payperiod; // Fetch the formatted date
	        $total_salary = $row->total_salary;
	        $total_hours = $row->total_hours;
		    addHeader($pdf);
		    $pdf->Image('../../images/mrflogo.png', 25, $pdf->GetY() - 45, 35);
		    $pdf->SetFont('Arial', 'B', 10); // Set the label text to be bold

		    $pdf->Cell(95, 10, 'FIRSTNAME: ' .$emp_fname.' '.$emp_mname.' ' .$emp_lname.'', 1, 0);
		    $pdf->Cell(50, 10, 'DATE OF BIRTH: ' .$emp_dateofbirth.'', 1, 0);
		    $pdf->Cell(45, 10, 'POSITION: ' .$role_name.'', 1, 1);
		    
		    $pdf->Cell(47, 10, 'START DATE: ' .$start.'', 1, 0);
		    $pdf->Cell(48, 10, 'END DATE: ' .$end.'', 1, 0);
		    $pdf->Cell(40, 10, 'TOTAL HOURS: ' .$total_hours.'', 1, 0);
		    $pdf->Cell(55, 10, 'PAY PERIOD: ' .$formatted_payperiod.'', 1, 1);
		    
		    $pdf->SetFont('Arial', 'B', 10); 

		    $pdf->Cell(95, 10, 'EARNINGS', 1, 0, 'C');
		    $pdf->Cell(95, 10, 'DEDUCTIONS', 1, 1, 'C');

		    $pdf->SetFont('Arial', '', 10); 

		    $pdf->MultiCell(95, 10, 'BASIC SALARY: P '.$total_salary."\n".'ALLOWANCE: _______________', 'LRTB', false);

		    $nextX = $pdf->GetX() + 95;
		    $nextY = $pdf->GetY() - 20;
		    $pdf->SetXY($nextX, $nextY);
		    $pdf->MultiCell(95, 10, 'SSS: _______________'."\n".'PHILHEALTH: _______________', 'LTRB', false);

		    $pdf->SetFont('Arial', 'B', 10); 

		    $nextX = $pdf->GetX();
		    $nextY = $pdf->GetY();
		    $pdf->SetXY($nextX, $nextY);
		    $pdf->Cell(95, 10, 'TOTAL EARNINGS: _______________', 1, 0, 'C');
		    $pdf->Cell(95, 10, 'TOTAL DEDUCTIONS: _______________', 1, 1, 'C');

		    $nextX = $pdf->GetX();
		    $nextY = $pdf->GetY();
		    $pdf->SetXY($nextX, $nextY);
		    $pdf->Cell(0, 10, 'TOTAL SALARY: _______________', 1, 1, 'C');

		    $nextX = $pdf->GetX();
		    $nextY = $pdf->GetY() + 25;
		    $pdf->SetXY($nextX, $nextY);
		    addBrokenLine($pdf, 190);
		    $pdf->Ln(20); 
        }
			$pdf->Output();
        
    }
}



?>