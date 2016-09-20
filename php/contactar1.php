<?php

header("Content-Type: text/html; charset=utf-8");

include("conexionBD.php");

//Obtenemos valores del formulario
$namePHP = $_POST['name'];
$emailPHP = $_POST['email'];
$companyPHP = $_POST['company'];
$messagePHP = $_POST['message'];


//Variables del Correo
$destino  = "$emailPHP";

$asunto = "Mensaje de Lappsii";

$template = file_get_contents('LAPPSII.html');
$template = str_replace('%name%', $namePHP,$template);
$template = str_replace('%email%', $emailPHP,$template);
$template = str_replace('%company%', $companyPHP,$template);
$template = str_replace('%message%', $messagePHP,$template);
$template = str_replace('\r\n','<br>', $template);


$header  = "From: Lappsii <contacto@lappsii.com>\r\n";
$header .= "Bcc: racing_rica@hotmail.com\r\n";
$header .= "Reply-To: " .$emailPHP. "\r\n";
$header .= "Content-Type: text/html\r\n";


//Insercion a la BD
if(isset($_POST['name']) && !empty($_POST['name']) &&
   isset($_POST['email']) && !empty($_POST['email']) &&
   isset($_POST['company']) && !empty($_POST['company']) &&
   isset($_POST['message']) && !empty($_POST['message']))
{
  $link = mysqli_connect($server, $user, $pass) or die('Problemas al conectar');
  mysqli_select_db($link, $db) or die('Problemas al conectar a la BD');

  mysqli_query($link, "INSERT INTO clientes (name, email, company, message) values ('$namePHP', '$emailPHP', '$companyPHP', '$messagePHP')");

  mysqli_close($link);

} else {
  echo "Problemas al insertar a la Base de Datos";
}
        

//Envio del correo
$enviado = mail($destino, $asunto, $template, $header);

if($enviado){

    echo '
          <div id="DivForm">
            <script>document.getElementById("lappsiiForm1").reset();</script>

            <script language="javascript">
              swal({ title: "Mensaje enviado", 
                     text: "Lappsii agradece su preferencia", 
                     type: "success", 
                     confirmButtonText: "Ok" 
              });
            </script>

          </div>
         ';

} else {
	  echo '
          <div id="DivForm">
            <script>document.getElementById("lappsiiForm1").reset();</script>

            <script language="javascript">
              sweetAlert({ title:"Error al enviar",
                           text:"Ocurrio un error",
                           type:"error",
                           confirmButtonText: "Ok"
              }); 
            </script>
            
          </div>
	     ';
    }

?>