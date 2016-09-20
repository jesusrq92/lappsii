<?php

header("Content-Type: text/html; charset=utf-8");

//Obtenemos valores del formulario
$namePHP = $_POST['name'];
$emailPHP = $_POST['email'];
$companyPHP = $_POST['company'];
$messagePHP = $_POST['message'];

$copyEmailPHP = "contacto@lappsii.com";

//variables del Correo
$destino = "$copyEmailPHP,$emailPHP";

$asunto = "Mensaje de Lappsii";

$template = file_get_contents('LAPPSII.html');
$template = str_replace('%name%', $namePHP,$template);
$template = str_replace('%email%', $emailPHP,$template);
$template = str_replace('%company%', $companyPHP,$template);
$template = str_replace('%message%', $messagePHP,$template);
$template = str_replace('\r\n','<br>', $template);


$header  = "From: Lappsii <contacto@lappsii.com>\r\n";
$header .= "Reply-To: " .$emailPHP. "\r\n";
$header .= "Content-Type: text/html\r\n";
        

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