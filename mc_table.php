<?php 
session_start();
header( 'Content-type: text/html; charset=iso-8859-1' );
require ("lib_pdf/fpdf.php");


class PDF_MC_Table extends FPDF 
{ 
   var $widths; 
   var $aligns;

   function Footer()
   {
	  global $user;
      //Posición: a 1,5 cm del final
      $this->SetY(-15);
      //Arial italic 8
      $this->SetFont('Times','I',12);
      //Número de página
      $this->Cell(0,10,'Página n° '.$this->PageNo().' - '.$user.' - '.date("d-m-Y H:i:s"),0,0,'R');
   }

   function SetWidths($w) 
   { 
       //Set the array of column widths 
       $this->widths=$w; 
   } 

   function SetAligns($a) 
   { 
      //Set the array of column alignments 
      $this->aligns=$a; 
   } 

   function fill($f)
   {
	  //juego de arreglos de relleno
	  $this->fill=$f;
   }

   function fsalida($cad2)
   {
      $tres=substr($cad2, 0, 4);
      $dos=substr($cad2, 5, 2);
      $uno=substr($cad2, 8, 2);
      $cad = ($uno."/".$dos."/".$tres);
   
      $dia=substr($cad,0,2);
      $ano=substr($cad,6,4);
      $meses=substr($cad,3,2);
      switch($meses)
      {
         case 1:
	        $meses="Enero";
	        break;
         case 2:
	        $meses="Febrero";
	        break;
         case 3:
	        $meses="Marzo";
	        break;
         case 4:
	        $meses="Abril";
	        break;
         case 5:
	        $meses="Mayo";
	        break;
         case 6:
	        $meses="Junio";
	        break;
         case 7:
	        $meses="Julio";
	        break;
         case 8:
	        $meses="Agosto";
	        break;
         case 9:
	        $meses="Septiembre";
	        break;
         case 10:
	        $meses="Octubre";
	        break;
         case 11:
	        $meses="Noviembre";
	        break;
         case 12:
	        $meses="Diciembre";
	        break;
      }
      $this->Cell(15);
      $this->Cell(0,0,"Portoviejo,  ".$dia." de ".$meses." del ".$ano,0,1,'L');
   }

   //HOJA VERTICAL
   function imagenes() 
   { 
      $this->Image("../../img/iconoizquierdo.jpg" , 30 ,10, 17 , 27 , "JPG" );
      $this->Cell(5);
   }

   //HOJA HORIZONTAL
   function imagenes2() 
   { 
      $this->Image("../../img/iconoizquierdo.jpg" , 32 ,10, 17 , 27 , "JPG" );
      $this->Cell(5);
   }


   //HOJA VERTICAL
   function iglesia($nomigle, $ciu, $parro) 
   { 
      $this->Cell(5);
      $this->SetFont('Times','B',14);
      $this->text(78,18,'PARROQUIA ECLESIÁSTICA "'.$nomigle.'" DE '.$parro.'');
	  $this->text(105,24,'MANABÍ - '.$ciu.' - '.$parro.'');   	
      $this->Cell(5);
	  $this->Ln(2);
   }

   //HOJA HORIZONTAL
   function iglesia2($nomigle, $ciu, $parro) 
   { 
      //$this->Cell(5);
      $this->SetFont('Times','B',12);
      $this->text(53,18,'PARROQUIA ECLESIÁSTICA "'.$nomigle.'" DE '.$parro.'');
	  $this->text(75,24,'MANABÍ - '.$ciu.' - '.$parro.'');   	
      //$this->Cell(5);
	  $this->Ln(2);
   }

   function Row($data,$esp) 
   { 
      //Calculate the height of the row 
	  $nb=0; 
      for($i=0;$i<count($data);$i++) 
      $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i])); 
      $h=$esp*$nb; 
      //Issue a page break first if needed 
      $this->CheckPageBreak($h); 
      //Draw the cells of the row 
	  for($i=0;$i<count($data);$i++) 
      { 
	     $w=$this->widths[$i]; 
         $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L'; 
         //Save the current position 
         $x=$this->GetX(); 
         $y=$this->GetY(); 
         //Draw the border 
	     $this->Rect($x,$y,$w,$h,$style); 
         //Print the text 
	     //$this->MultiCell($w,5,$data[$i],'LTR',$a,$fill);
	     $this->MultiCell($w,$esp,$data[$i],'LTR',$a,$fill); 
         //Put the position to the right of the cell 
         $this->SetXY($x+$w,$y); 
	     //$fill=!$fill;
      }
      //Go to the next line 
      $this->Ln($h); 
   } 
 
   function Row2($data) 
   { 
      //Calculate the height of the row 
	  $nb=0; 
      for($i=0;$i<count($data);$i++) 
      $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i])); 
      $h=5*$nb; 
      $this->CheckPageBreak($h); 
	  for($i=0;$i<count($data);$i++) 
      { 
         $w=$this->widths[$i]; 
         $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L'; 
	     $x=0;
	     $y=0;
	     $this->MultiCell($w,5,$data[$i],0,$a); 
         $this->SetXY($x+$w,$y); 
      }
      $this->Ln($h); 
   }  

   function Row3($data) 
   {  
	  $nb=0; 
      for($i=0;$i<count($data);$i++) 
      $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i])); 
      $h=5*$nb; 
      $this->CheckPageBreak($h); 
	  for($i=0;$i<count($data);$i++) 
      { 
	     $w=$this->widths[$i]; 
         $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L'; 
         $x=$this->GetX(); 
         $y=$this->GetY(); 
	     $this->MultiCell($w,5,$data[$i],0,$a,$fill); 
         $this->SetXY($x+$w,$y); 
      }
      $this->Ln($h); 
   } 

   function CheckPageBreak($h) 
   { 
      //If the height h would cause an overflow, add a new page immediately 
      if($this->GetY()+$h>$this->PageBreakTrigger) 
      $this->AddPage($this->CurOrientation); 
   }   

   function NbLines($w,$txt) 
   { 
      //Computes the number of lines a MultiCell of width w will take 
      $cw=&$this->CurrentFont['cw']; 
      if($w==0) 
         $w=$this->w-$this->rMargin-$this->x; 
      $wmax=($w-2*$this->cMargin)*1000/$this->FontSize; 
      $s=str_replace("\r",'',$txt); 
      $nb=strlen($s); 
      if($nb>0 and $s[$nb-1]=="\n") 
         $nb--; 
      $sep=-1; 
      $i=0; 
      $j=0; 
      $l=0; 
      $nl=1; 
      while($i<$nb) 
      { 
         $c=$s[$i]; 
         if($c=="\n") 
         { 
            $i++; 
            $sep=-1; 
            $j=$i; 
            $l=0; 
            $nl++; 
            continue; 
         } 
         if($c==' ') 
            $sep=$i; 
         $l+=$cw[$c]; 
         if($l>$wmax) 
         { 
            if($sep==-1) 
            { 
                if($i==$j) 
                    $i++; 
            } 
            else 
                $i=$sep+1; 
            $sep=-1; 
            $j=$i; 
            $l=0; 
            $nl++; 
         } 
         else 
            $i++; 
         } 
         return $nl; 
      } 
   } 
?>      
