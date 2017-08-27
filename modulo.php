<?php
date_default_timezone_set('America/Guayaquil');
function Conectarse()
{
    $bdservidor = "localhost";
    $bdusuario = "root";
    $bdpass = "root";
    $bdnombre = "iglesia";

    if (!($link=mysql_connect($bdservidor,$bdusuario,$bdpass)))
    { 
        echo "Error conectando a la base de datos."; 
        exit(); 
    } 
    if (!mysql_select_db($bdnombre,$link))
    { 
        echo $bdservidor;
        echo "Error seleccionando la base de datos."; 
        exit();  
    } 
    return $link; 
} 

function retorna_consulta($SQL)
{
    $link=Conectarse();
	$result=mysql_query($SQL,$link);
    mysql_close($link);
    return $result;
}

/* FUNCION QUE GENRERA CODIGO */
function Genera_codigo($Tabla,$Campo)
{
    $SQL= "SELECT max(" . $Campo . ") FROM " . $Tabla . "";
    $result = retorna_consulta($SQL);
	if ($row = mysql_fetch_row($result))
	{
	    $codigo = $row[0]+1;
	}
	else
	{
	    $codigo = 1;
	}
	mysql_free_result($result);
    return $codigo;
}
 
function ejecuta_sql($SQL)
{
    //PARA OPERACIONES SQL: INSERT,UPDETE,DELETE
    $link=Conectarse();
    mysql_query($SQL,$link);
    mysql_close($link);
}
    
function intest($mouse)
{
	
	$auxm=ltrim(rtrim($mouse));
	$aux2m=$mouse;
	$aux2m=strlen($aux2m);
	$car='';				  
	for ( $y = ($aux2m - 1) ; $y >= 0 ; --$y)
	{	 	           		
		if (ord(substr($auxm, $y, 1)) >= 65 && ord(substr($auxm, $y, 1)) <= 90 || ord(substr($auxm, $y, 1)) >= 48 && ord(substr($auxm, $y, 1)) <= 57)
		{
			$p=$p.(ord(substr($auxm, $y, 1)) * 64 );
			$n=(int)(ord(substr($auxm, $y, 1)));
			$car=(chr($n)).$car;			
		}
		else
		{
		    if (ord(substr($auxm, $y, 1)) >= 97 && ord(substr($auxm, $y, 1)) <= 122)
		    {
			    $p=$p.(ord(substr($auxm, $y, 1)) * 64 );
			    $n=(int)(ord(substr($auxm, $y, 1)));
			    $car=(chr($n)).$car;			
		    }
		    else
		    {				
				if (192 == ord(substr($auxm, $y, 1)) || 193 == ord(substr($auxm, $y, 1)) || 194 == ord(substr($auxm, $y, 1)) || 195 == ord(substr($auxm, $y, 1)) || 196 == ord(substr($auxm, $y, 1)) || 197 == ord(substr($auxm, $y, 1)))					 
				{
					$p=$p.(ord('A') * 64 );
					$n=(int)(ord('A'));
					$car=(chr($n)).$car;
					
				}
				if (201 == ord(substr($auxm, $y, 1)) || 202 == ord(substr($auxm, $y, 1)) || 203 == ord(substr($auxm, $y, 1)))					 
				{
					$p=$p.(ord('E') * 64 );
					$n=(int)(ord('E'));
					$car=(chr($n)).$car;
				}
				if (204 == ord(substr($auxm, $y, 1)) || 205 == ord(substr($auxm, $y, 1)) || 206 == ord(substr($auxm, $y, 1)) || 207 == ord(substr($auxm, $y, 1)))					 
				{
					$p=$p.(ord('I') * 64 );
					$n=(int)(ord('I'));
					$car=(chr($n)).$car;
				}
				if (210 == ord(substr($auxm, $y, 1)) || 211 == ord(substr($auxm, $y, 1)) || 212 == ord(substr($auxm, $y, 1)) || 213 == ord(substr($auxm, $y, 1)) || 214 == ord(substr($auxm, $y, 1)))					 
				{
					$p=$p.(ord('O') * 64 );
					$n=(int)(ord('O'));
					$car=(chr($n)).$car;
				}
				if (217 == ord(substr($auxm, $y, 1)) || 218 == ord(substr($auxm, $y, 1)) || 219 == ord(substr($auxm, $y, 1)) || 220 == ord(substr($auxm, $y, 1)))					 
				{
					$p=$p.(ord('U') * 64 );
					$n=(int)(ord('U'));
					$car=(chr($n)).$car;
				}
				if (209 == ord(substr($auxm, $y, 1)) || 241 == ord(substr($auxm, $y, 1)) || 164 == ord(substr($auxm, $y, 1)))					
				{					
					$p=$p.(ord('N') * 64 );
					$n=(int)(ord('N'));
					$car=(chr($n)).$car;
				}
		    }
		}
	}
	return $p;
}


function test($mouse)
  {
	  $aux=$mouse;
	  $aux2=$mouse;
	  $aux2=strlen($mouse);
	  for ( $j = ($aux2 - 1) ; $j >= 0 ; $j --)
	  {		  		    
			$p=$p.(ord(substr($aux, $j, 1)) * 64 );
	  }
	  return $p;
  }
  
function test2($mouse)
  {
     $in=$mouse;
     $c=0; 
     $p='';
	 $aux2=strlen($in);
	 $aux=($aux2/4);
     for ($j=1; $j <= $aux; $j++)
     {
        $c=$c+4;
        $p=$p.chr((substr($in, ($aux2 - $c), 4))/64);     
     }
     return $p;
  }
function registro($reg)
  {
	  $link=Conectarse();      
      $sql=mysql_query("SELECT lower(CONCAT(p.NOMBRES,' ',p.APELLIDOS)) as nom FROM `usuarios` as u, `personas` as p where u.IDUSUARIOS = ".$reg." and u.RESPONSABLE = p.IDPERSONA limit 1",$link);
	  if($row1=mysql_fetch_array($sql))
      {         
         $res=$row1[0];  	  
	  }
	  return $res;
  }
function tipo($reg)
  {
	  $link=Conectarse();	 
      $sql=mysql_query("SELECT TIPO FROM `usuarios` where IDUSUARIOS = ".$reg." limit 1",$link);
      $row1=mysql_fetch_array($sql);
	  $res=$row1[0];
	  return $res;
  }

function ntipo($reg)
  {
	  $link=Conectarse();	 
      $sql=mysql_query("SELECT t.NOMBRE FROM `usuarios` as u, `tipo_usuario` as t where u.IDUSUARIOS = ".$reg." and u.TIPO = t.IDTIPO limit 1",$link);
      $row1=mysql_fetch_array($sql);
	  $res=$row1[0];
	  return $res;
  }

function nlogin($reg)
  {
	  $link=Conectarse();	 
      $sql=mysql_query("SELECT LOGIN FROM `usuarios` where IDUSUARIOS = ".$reg." limit 1",$link);
      $row1=mysql_fetch_array($sql);
	  $res=$row1[0];
	  return $res;
  }
function imagenfondo($t)
  {
	  $link=Conectarse();
      $sql=mysql_query("SELECT FONDOCOLOR FROM `configuracion` where ACTIVO = 'SI' and TIPO = ".$t." limit 1",$link);
      $row1=mysql_fetch_row($sql);
      $res=$row1[0];
	  return $res;
  }
?>
