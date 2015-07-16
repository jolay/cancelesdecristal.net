<?php
    if(isset($_POST['mail'])) {
          
        // EDIT THE 2 LINES BELOW AS REQUIRED
        $email_to = "ventas@cancelesdecristal.net,tavo@neyra.mx,olay.jorge@neyra.mx";
        $email_subject = "Contacto desde Landing Page";
         
        
        $name = $_POST['name']; // required
        $email_from = $_POST['mail']; // required
        $text = $_POST['message']; // required
         
        $email_message = "Mensaje desde sitio Tu Espacio en Cristal: \n\n";
         
        function clean_string($string) {
          $bad = array("content-type","bcc:","to:","cc:","href");
          return str_replace($bad,"",$string);
        }
         
        $email_message .= "Nombre: ".clean_string($name)."\n";
        $email_message .= "Email: ".clean_string($email_from)."\n";
        $email_message .= "Asunto: ".clean_string('Contacto desde sitio web')."\n";
        $email_message .= "Mensaje: ".clean_string($text)."\n";
         
         
    // create email headers
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    if(@mail($email_to, $email_subject, $email_message, $headers)) {
        $data['status'] = TRUE;
        $data['msg'] = 'Su mensaje ha sido enviado';
        $data['class'] = 'Hecho';
    } else {
        $data['status'] = FALSE;
        $data['msg'] = 'Número seleccionado incorrecto';
        $data['class'] = 'Error';
    }
    
    echo json_encode($data);
}
?>