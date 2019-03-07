<?php
$Nombre = $_POST['txt_nombres'];
$apellidos = $_POST['txt_apellidos'];
$correo = $_POST['txt_correo'];
$cel = $_POST['celular'];
$Mensaje = $_POST['comment'];


if ($Nombre=='' || $correo=='' || $Mensaje==''){

echo "<script>alert('Los campos marcados con * son obligatorios');location.href ='javascript:history.back()';</script>";

}else{


    require("archivosformulario/class.phpmailer.php");
    $mail = new PHPMailer();

    $mail->From     = $correo;
    $mail->FromName = $Nombre; 
    $mail->AddAddress("contacto.macom@gmail.com"); // Dirección a la que llegaran los mensajes.
   
// Aquí van los datos que apareceran en el correo que reciba
    //adjuntamos un archivo 
        //adjuntamos un archivo
            
    $mail->WordWrap = 50; 
    $mail->IsHTML(true);     
    $mail->Subject  =  "Contacto";
    $mail->Body     =  "Nombre: $Nombre \n<br />".    
    "Correo: $correo \n<br />".   
    "numero de contacto: $cel  \n<br />".  
    "Mensaje: $Mensaje \n<br />";
   
    
    
    

// Datos del servidor SMTP

    $mail->IsSMTP(); 
    $mail->Host = "ssl://smtp.gmail.com:465";  // Servidor de Salida.
    $mail->SMTPAuth = true; 
    $mail->Username = "contacto.macom@gmail.com";  // Correo Electrónico
    $mail->Password = "tucontra"; // Contraseña
    
    if ($mail->Send())
    header('Location: ../index.php');
    
    else
    header('Location: ../index.php');
}
?>