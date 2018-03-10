<?php
    require "fpdf.php";
    $connection = new PDO(
        "mysql:host=localhost;dbname=webtech1;charset=utf8mb4",
        "root",
        ""
    );
    class myPDF extends FPDF{
        function header(){
            $this->SetFont('Arial','B',14);
            $this->Cell(276,5,'');
            $this->Ln();
            $this->SetFont('Times','',12);
            $this->Cell(276,10,'Kitty-Event.com',0,0,'C');
            $this->Ln(20);
        }

        function footer(){
            $this->SetY(-15);
            $this->Setfont('Arial','',0);
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }

        function headerTable(){
            $this->SetFont('Times','B',12);
            $this->CELL(40,10,'Name',1,0,'C');
            $this->CELL(60,10,'Place',1,0,'C');
            $this->CELL(40,10,'Start Date',1,0,'C');
            $this->CELL(40,10,'Finish Date',1,0,'C');
            $this->CELL(40,10,'Amount Attendant',1,0,'C');
            $this->Ln();
        }
        function viewTable($connection){
            $this->setFont('Times','',12);
            // $stmt= $connection->query('SELECT event.*,organize.* FROM event,organize WHERE event.organize_id = organize.id ');
            $stmt= $connection->query('SELECT *FROM event');
            while($data = $stmt->fetch(PDO::FETCH_OBJ)){
                $this->CELL(40,10,$data->name,1,0,'L');
                $this->CELL(60,10,$data->place,1,0,'L');
                $this->CELL(40,10,$data->event_start_date,1,0,'C');
                $this->CELL(40,10,$data->event_finish_date,1,0,'C');
                $this->CELL(40,10,$data->max_attendents,1,0,'C');
                $this->Ln();
            }

        }
    }
    $pdf = new myPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4',0);
    $pdf->headerTable();
    $pdf->viewTable($connection);
    $pdf->Output();

?>