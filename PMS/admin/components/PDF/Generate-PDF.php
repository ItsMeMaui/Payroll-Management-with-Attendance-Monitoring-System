<?php

$dbServername = "Localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "pmswa";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if (isset($_POST['generateBC'])) {
    require("../../fpdf/fpdf.php");

    $start = $_POST['start'];
    $end = $_POST['end'];
    // if($start > $end) {
    //     header('Location: Generate-PDF.php?error=errorinputdate');
    //     exit();
    //     // echo "Invalid date values. Start date must be lower than End date.";
    // } else {
    //     echo "Correct";
    // }

    // $fullName = $firstName." ".$middleName." ".$lastName;

    $pdf = new FPDF('P', 'mm', 'Letter');
    $pdf->SetFont('Arial', 'B', 12);

    $pdf->AddPage();
    $pdf->Image('../../images/mrflogo.png', 10, 13, 35, 0);
    ob_start();
    // $pdf->Image('../../upload/splogo.png', 160, 3, 55, 0);
    ob_start();

    //Header content
    $pdf->SetXY(15, 20);
    $pdf->SetFont('Arial', '', 20);
    $pdf->MultiCell(0, 10, 'MRF Realty and Services' . "\n" . 'General Santos City' . "\n", 0, 'C');

    // date display
    $pdf->SetXY(10, 60);
    $pdf->SetFont('Arial', 'B', 25);
    $pdf->Cell(100, 15, 'Summary Report', 0, 1, 'L');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(100, 10, 'Date Started: ' . $start, 0, 1, 'L');
    $pdf->Cell(100, 10, 'Date Ended: ' . $end, 0, 0, 'L');

    // table column headers
    $pdf->SetXY(10, 100);
    $pdf->Cell(100, 10, "Employee's Name", 1, 0, 'C');
    $pdf->Cell(0, 10, 'Total Salary', 1, 0, 'C');

    // Select data from MySQL database
    $select = "SELECT 
	    e.emp_id,
	    e.emp_fname,
	    e.emp_mname,
	    e.emp_lname,
	    r.role_rate_per_hour,
	    DATE_FORMAT(a.attendance_date, '%m/%d/%Y') AS formatted_attendance_date,
	    SUM(a.attendance_hour) AS total_hours,
	    ROUND(SUM(a.attendance_hour * r.role_rate_per_hour), 2) AS total_salary
	FROM
	    tbl_attendances a
	JOIN
	    tbl_employees e ON a.emp_id = e.emp_id
	JOIN
	    tbl_roles r ON e.role_id = r.role_id
	WHERE
	    DATE_FORMAT(a.attendance_date, '%m/%d/%Y') BETWEEN '$start' AND '$end' and e.emp_status = 'Active'
	GROUP BY
	    e.emp_id, e.emp_fname, e.emp_mname, e.emp_lname, r.role_rate_per_hour";
    $result = $conn->query($select);
    $a = "U+20B1";
    $b = iconv('UTF-8', 'windows-1252', html_entity_decode($a));
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->SetXY(10, 110);

    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_object()) {
            $user_id = $row->emp_id;
            $fname = $row->emp_fname;
            $lname = $row->emp_lname;
            $mname = $row->emp_mname;
            $total_salary = $row->total_salary;

            $pdf->Cell(100, 10, $fname . ' ' . $lname, 1, 0, 'L');
            $pdf->Cell(0, 10, 'P ' . $total_salary, 1, 0, 'C');


            $pdf->Ln();
        }
    } else {
        $pdf->Cell(100, 10, 'No Data', 1, 0, 'C');
        $pdf->Cell(0, 10, 'No Data', 1, 0, 'C');

        $pdf->Ln();
    }

    // ob_end_flush();[[1]][1];

    $pdf->Output();
}

if (isset($_POST['generateSpecificReport'])) {
    require("../../fpdf/fpdf.php");

    $start = $_POST['start'];
    $end = $_POST['end'];
    $user = $_POST['selecteduser'];



    $pdf = new FPDF('P', 'mm', 'Letter');
    $pdf->SetFont('Arial', 'B', 12);

    $pdf->AddPage();
    $pdf->Image('../../images/mrflogo.png', 10, 13, 35, 0);
    ob_start();
    // $pdf->Image('../../images/mrflogo.png', 160, 3, 55, 0);
    ob_start();

    //Header content
    $pdf->SetXY(15, 20);
    $pdf->SetFont('Arial', '', 20);
    $pdf->MultiCell(0, 10, 'MRF Realty and Services' . "\n" . 'General Santos City' . "\n", 0, 'C');

    // date display
    $pdf->SetXY(10, 60);
    $pdf->SetFont('Arial', 'B', 25);
    $pdf->Cell(100, 15, 'Summary Report', 0, 1, 'L');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(100, 10, 'Date Started: ' . $start, 0, 1, 'L');
    $pdf->Cell(100, 10, 'Date Ended: ' . $end, 0, 0, 'L');


    $select = "SELECT 
	    e.emp_id,
	    e.emp_fname,
	    e.emp_mname,
	    e.emp_lname,
	    r.role_rate_per_hour,
	    DATE_FORMAT(a.attendance_date, '%m/%d/%Y') AS formatted_attendance_date,
	    SUM(a.attendance_hour) AS total_hours,
	    ROUND(SUM(a.attendance_hour * r.role_rate_per_hour), 2) AS total_salary
	FROM
	    tbl_attendances a
	JOIN
	    tbl_employees e ON a.emp_id = e.emp_id
	JOIN
	    tbl_roles r ON e.role_id = r.role_id
	WHERE
	    DATE_FORMAT(a.attendance_date, '%m/%d/%Y') BETWEEN '$start' AND '$end' AND e.emp_id = '$user' and e.emp_status = 'Active'
	GROUP BY
	    e.emp_id, e.emp_fname, e.emp_mname, e.emp_lname, r.role_rate_per_hour";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_object()) {
            $order_amount = $row->total_salary;
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(0, 10, 'Total: P ' . $order_amount, 0, 1, 'R');
            $pdf->Ln();
        }
    } else {
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Total: P 0.00', 0, 1, 'R');
        $pdf->Ln();
    }

    // table column headers
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetXY(10, 100);
    $pdf->Cell(70, 10, "Employee's Name", 1, 0, 'C');
    $pdf->Cell(70, 10, 'Total Hours', 1, 0, 'C');
    $pdf->Cell(0, 10, 'Total Salary', 1, 0, 'C');
    $pdf->SetXY(10, 110);



    // Select data from MySQL database
	$select = "SELECT 
	    e.emp_id,
	    e.emp_fname,
	    e.emp_mname,
	    e.emp_lname,
	    r.role_rate_per_hour,
	    DATE_FORMAT(a.attendance_date, '%m/%d/%Y') AS formatted_attendance_date,
	    SUM(a.attendance_hour) AS total_hours,
	    ROUND(SUM(a.attendance_hour * r.role_rate_per_hour), 2) AS total_salary
	FROM
	    tbl_attendances a
	JOIN
	    tbl_employees e ON a.emp_id = e.emp_id
	JOIN
	    tbl_roles r ON e.role_id = r.role_id
	WHERE
	    DATE_FORMAT(a.attendance_date, '%m/%d/%Y') BETWEEN '$start' AND '$end' AND e.emp_id = '$user' and e.emp_status = 'Active'
	GROUP BY
	    e.emp_id, e.emp_fname, e.emp_mname, e.emp_lname, r.role_rate_per_hour";

	$result = mysqli_query($conn, $select);
	$pdf->SetFont('Arial', 'B', 14);

	if (mysqli_num_rows($result) > 0) {
	    while ($row = mysqli_fetch_object($result)) {
	        $user_id = $row->emp_id;
	        $fname = $row->emp_fname;
	        $lname = $row->emp_lname;
	        $mname = $row->emp_mname;
	        $formatted_attendance_date = $row->formatted_attendance_date; // Fetch the formatted date
	        $order_amount = $row->total_salary;
	        $total_hours = $row->total_hours;

	        $pdf->Cell(70, 10, $fname . ' ' . $lname, 1, 0, 'L');
	        $pdf->Cell(70, 10, $total_hours, 1, 0, 'C'); // Use the fetched date
	        $pdf->Cell(0, 10, 'P ' . $order_amount, 1, 0, 'C');

	        $pdf->Ln();
	    }
	} else {
	    $pdf->Cell(70, 10, 'No Data', 1, 0, 'C');
	    $pdf->Cell(70, 10, 'No Data', 1, 0, 'C');
	    $pdf->Cell(0, 10, 'No Data', 1, 0, 'C');

	    $pdf->Ln();
	}




    $pdf->Output();
}
