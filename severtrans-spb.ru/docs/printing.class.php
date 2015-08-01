<?php
class Printing extends FPDF {
    function Title($r) 
	{
		$this->Cell(80);
		$this->SetFont('Arial-BoldMT','',16);
        $this->Cell(30,8,$r[8],0,0,'C',0);
		$this->Cell(20,8,$r[9],0,0,'L',0);
        $this->Cell(60,8,$r[13],0,0,'L',0);
		$this->ln();
		$this->ln();
		$this->Cell(10);
        $this->SetFont('Arial-BoldMT','',12);
        $this->Cell(100,6,$r[0],0,0,'L',0);
		$this->Cell(70);
        $this->Cell(100,6,$r[10],0,0,'L',0);
		$this->ln();
		$this->Cell(10);
        $this->SetFont('ArialMT','',12);
        $this->Cell(100,6,$r[1],0,0,'L',0);
		$this->Cell(70);
        $this->Cell(100,6,$r[11],0,0,'L',0);
		$this->ln();
		$this->Cell(10);
		$this->SetFont('ArialMT','',12);
		$this->Cell(40,6,$r[2],0,10,'L',0);
        $this->Cell(40,6,$r[3],0,10,'L',0);
        $this->Cell(40,6,$r[4],0,10,'L',0);
        $this->Cell(40,6,$r[5],0,10,'L',0);
		$this->Cell(40,6,$r[6],0,10,'L',0);
		$this->Cell(40,6,$r[7],0,10,'L',0);
		$this->Cell(40,6,$r[15],0,10,'L',0);
        $this->ln();
        $this->ln();
		$this->Cell(10);
		$this->SetFont('ArialMT','',12);
		$this->Cell(10,5,$r[12],0,10,'L',0); 
		$this->ln();
    }
function OutputTable($header,$tab) {
        $w=array(85,20,20,20,20,30,30,30,30,30);
        $this->Cell(10);
        $this->SetFont('Arial-BoldMT','',10);
        for($i=0;$i<count($header);$i++){$this->Cell($w[$i],7,$header[$i],1,0,'C');}
        $this->Ln();
        $this-> SetFont('ArialMT','',12);
		      $this->Cell(10);
              $this->Cell(85,20,$tab[0],1,0,'C',0);
              $this->Cell(20,20,$tab[1],1,0,'C',0);
              $this->Cell(20,20,$tab[2],1,0,'C',0);
              $this->Cell(20,20,$tab[3],1,0,'C',0);
			   $this->Cell(20,20,$tab[4],1,0,'C',0);
			    $this->Cell(30,20,$tab[5],1,0,'C',0);
				 $this->Cell(30,20,$tab[6],1,0,'C',0);
              $this->Cell(30,20,$tab[7],1,0,'C',0,1);
              $this->ln();
             
    } 
	 function Outt($out,$image) 
	{
		$this->Cell(10);
        $this->SetFont('ArialMT','',12);
        $this->Cell(40,10,$out[0],0,0,'L',0);
        $this->Cell(100,10,$out[2],0,0,'L',0);
		$this->ln();
		$this->Image($image,20,137,185,55);
		$this->ln();
		$this->ln();
		
    }
}
?>