<?php

if(isset($_POST['odeslat'])){
   $name = $_POST['jmeno']; 
   $mailFrom = $_POST['mail']; 
   $message = $_POST['zprava']; 

   $mailTo = "danielbohatec57@gmail.com";
   $headers = "From:" . $mailFrom;
   $txt = "You have received an email from:" . $name . $message;

   mail($mail,"", $txt, $headers);
   head("Location: index.php?mailsend");
}

?>