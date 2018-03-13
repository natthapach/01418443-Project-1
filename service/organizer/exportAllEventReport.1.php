<?php 
    session_start();
    $username = $_SESSION["current_username"];
	// require 'tfpdf/tfpdf.php';
	require('mcTable.php');
    


	class reportPDF extends tFPDF{

		function header(){
			// $this->Image('../../assets/image/logo.png',105,10,20,20);
            $this->SetFont('Arial','B',20);
            $username = $_SESSION["current_username"];
			$this->Cell(290,20,"$username Event",0,0,'C');
			$this->Ln();
			$this->SetFont('Times','',12);
			$this->SetFont('Times','',12);
		}

		function headerTable(){
			$this->SetFont('Times','B',12);
			$this->Cell(20,10,'ID',1,0,'C');
			$this->Cell(40,10,'Event Name',1,0,'C');
			$this->Cell(50,10,'Start Date',1,0,'C');
			$this->Cell(50,10,'End Date',1,0,'C');
            $this->Cell(50,10,'Close Date',1,0,'C');
            $this->Cell(50,10,'Current Attendant',1,0,'C');
			$this->Ln();
		}

		function bodyTable(){
			$this->SetFont('Arial','',12);
			include('../connection.php');
			$statement = $connection->prepare(
                'select e.*, COUNT(at.event_id) as attendants
                from event as e 
                join organizer as o 
                on o.id = e.organizer_id 
                join account as a 
                on o.user_name = a.user_name 
                left join attendences as at
                ON at.event_id = e.id
                where a.user_name=:username
                GROUP BY e.id'
            );
            $username = $_SESSION["current_username"];
            $statement->execute([
                ":username"=>$username
            ]);

            $this->AddFont('DejaVu','','THSarabun.ttf',true);
            $this->SetFont('DejaVu','',14);
            // $this->SetFont('Arial','B',20);
			while($row = $statement->fetch(PDO::FETCH_OBJ)){
                // echo json_encode($row);
                // echo $row->name;
				$this->MultiCell(20,10,$row->id, 1);
				$this->MultiCell(20,10,$row->name, 1);
				$this->MultiCell(20,10,$row->event_start_date, 1);
				$this->MultiCell(20,10,$row->event_finish_date, 1);
                $this->MultiCell(20,10,$row->close_date, 1);
                $this->MultiCell(20,10,$row->attendants, 1);
				$this->Ln();
			}
		}
	}

	// $pdf = new reportPDF();
	// $pdf->AliasNbPages();
	// $pdf->AddPage('L','A4',0);
	// $pdf->headerTable();
	// $pdf->bodyTable();
	// $pdf->Output();

	
	
	
	$pdf=new PDF_MC_Table();
	$pdf->AddPage();
	$pdf->SetFont('Arial','',14);
	//Table with 20 rows and 4 columns
	$pdf->SetWidths(array(30,50,30,40));
	
	$pdf->SetFont('Arial','',12);
	include('../connection.php');
	$statement = $connection->prepare(
		'select e.*, COUNT(at.event_id) as attendants
		from event as e 
		join organizer as o 
		on o.id = e.organizer_id 
		join account as a 
		on o.user_name = a.user_name 
		left join attendences as at
		ON at.event_id = e.id
		where a.user_name=:username
		GROUP BY e.id'
	);
	$username = $_SESSION["current_username"];
	$statement->execute([
		":username"=>$username
	]);

	$pdf->AddFont('DejaVu','','THSarabun.ttf',true);
	$pdf->SetFont('DejaVu','',14);
	// $this->SetFont('Arial','B',20);
	while($row = $statement->fetch(PDO::FETCH_OBJ)){
		// echo json_encode($row);
		// echo $row->name;
		// $this->MultiCell(20,10,$row->id, 1);
		// $this->MultiCell(20,10,$row->name, 1);
		// $this->MultiCell(20,10,$row->event_start_date, 1);
		// $this->MultiCell(20,10,$row->event_finish_date, 1);
		// $this->MultiCell(20,10,$row->close_date, 1);
		// $this->MultiCell(20,10,$row->attendants, 1);
		// $this->Ln();
		$pdf->Row(array(
			$row->id,
			$row->name,
			$row->event_start_date,
			$row->event_finish_date
		));
	}

	// for($i=0;$i<20;$i++)
	// 	$pdf->Row(array(GenerateSentence(),GenerateSentence(),GenerateSentence(),GenerateSentence()));
	$pdf->Output();
 ?>