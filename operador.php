<?php
session_start();
date_default_timezone_set('America/Guayaquil');
include("modulo.php");
$usuario=$_POST['usuario'];
$con=$_POST['pass'];
$contrasena=intest($con);
$res=retorna_consulta("SELECT * FROM `usuarios` where LOGIN = '".$usuario."' and SSAP = '".$contrasena."' limit 1");
if ((mysql_num_rows($res)!=0))
{		
   unset($res);
   $res=retorna_consulta("select LOGIN, SSAP from `usuarios` where LOGIN = '".$usuario."' and SSAP = '".$contrasena."' and TIPO = 1 limit 1");
   if ((mysql_num_rows($res)!=0))
   {
	   unset($res);
       $res=retorna_consulta("select IDUSUARIOS from `usuarios` where LOGIN = '".$usuario."' and SSAP = '".$contrasena."' and TIPO = 1 limit 1");	   
	   if($row1=mysql_fetch_array($res))
       {
		  unset($res);	     
		  $_SESSION["idusu"]= $row1[0];		 
          $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");
		  header ("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']). "/" .   'admin/');
		  exit();
	   }
	   else
	   {
          unset($res);
	      echo" <script language=JavaScript> alert('No hay Usuario Administrador') </script>";			
          echo" <script language=JavaScript> location.href='index.php'; </script>";		 
	      exit;  
       }
	}

   unset($res);
   $res=retorna_consulta("select LOGIN, SSAP from `usuarios` where LOGIN = '".$usuario."' and SSAP = '".$contrasena."' and TIPO = 2 limit 1");
   if ((mysql_num_rows($res)!=0))
   {
	   unset($res);
       $res=retorna_consulta("select IDUSUARIOS from `usuarios` where LOGIN = '".$usuario."' and SSAP = '".$contrasena."' and TIPO = 2 limit 1");	   
	   if($row1=mysql_fetch_array($res))
       {
		  unset($res);	     
		  $_SESSION["idusu"]= $row1[0];		 
          $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");
		  header ("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']). "/" .   'operador/');
		  exit();
	   }
	   else
	   {
          unset($res);
	      echo" <script language=JavaScript> alert('No hay Usuario Operador') </script>";			
          echo" <script language=JavaScript> location.href='index.php'; </script>";		 
	      exit;  
       }
	}

   unset($res);
   $res=retorna_consulta("select LOGIN, SSAP from `usuarios` where LOGIN = '".$usuario."' and SSAP = '".$contrasena."' and TIPO = 3 limit 1");
   if ((mysql_num_rows($res)!=0))
   {
	   unset($res);
       $res=retorna_consulta("select IDUSUARIOS from `usuarios` where LOGIN = '".$usuario."' and SSAP = '".$contrasena."' and TIPO = 3 limit 1");	   
	   if($row1=mysql_fetch_array($res))
       {
		  unset($res);	     
		  $_SESSION["idusu"]= $row1[0];		 
          $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");
		  header ("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']). "/" .   'invitado/');
		  exit();
	   }
	   else
	   {
          unset($res);
	      echo" <script language=JavaScript> alert('No hay Usuario Invitado') </script>";			
          echo" <script language=JavaScript> location.href='index.php'; </script>";		 
	      exit;  
       }
	}    
}
else
{
	session_destroy();	
	header ("Location: http://".$_SERVER['HTTP_HOST']."/".'proyectoiglesia/index.php');
	exit;
}
?>