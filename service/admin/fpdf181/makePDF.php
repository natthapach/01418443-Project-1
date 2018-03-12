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
            $this->CELL(40,10,'Organize Name',1,0,'C');
            $this->CELL(40,10,'Attendant',1,0,'C');
            $this->Ln();
        }
        function viewTable($connection){
            $this->setFont('Times','',12);
            // $stmt= $connection->query('SELECT event.*,organize.* FROM event,organize WHERE event.organize_id = organize.id ');
            $stmt= $connection->query("SELECT e.*, o.name as 'organizer_name', COUNT(ad.event_id) as attendant FROM event as e JOIN organizer as o ON e.organizer_id = o.id LEFT JOIN attendences as ad ON e.id = ad.event_id GROUP BY e.id");
            while($data = $stmt->fetch(PDO::FETCH_OBJ)){
                $this->CELL(40,10,$data->name,1,0,'L');
                $this->CELL(60,10,$data->place,1,0,'L');
                $this->CELL(40,10,$data->event_start_date,1,0,'C');
                $this->CELL(40,10,$data->event_finish_date,1,0,'C');
                $this->CELL(40,10,$data->organizer_name,1,0,'C');
                $this->CELL(40,10,$data->attendant.'/'.$data->max_attendents,1,0,'C');
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