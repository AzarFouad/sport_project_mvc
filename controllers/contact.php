
<?php
if(isset($_POST['send'])){
    //extraction des variables
    extract($_POST);    
    //Verification si les variables existent et ne sont pas vides
    if(isset($username) && $username != "" &&
    isset($email) && $email != "" &&
    isset($phone) && $phone != "" &&
    isset($message) && $message != ""){
     //envoyer l'email
     //le destinataire (votre address mail)
            $to = "info@fouadalazar.fr";
            //objet du mail
            $subject = "Vous avez recu un message de : ". $email;
            
            $message = "
                <p>Vous avez recu un message de <strong>".$email."</stronge></p>
                <p><strong>Nom :</strong>".$username."</p>
                <p><strong>Téléphone :</strong>".$phone."</p>
                <p><strong>Message :</strong>".$message."</p>
            ";
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // More headers
            $headers .= 'From: <'.$email.'>' . "\r\n";            
            //envoindu mail
           $send= mail($to,$subject,$message,$headers);
            //Verification de l'envoi
             if($send){
                $_SESSION['succes_message']="message envoyé";
             }
             else{
                $info="message non envoyé";
             }
            }
            else{
                //si elle sont vides
                $info = "Veuillez remplire tout les champs !";
            }
        }  

       
require_once 'views/contact.php';
   ?>