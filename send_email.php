<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css?v=1.1">
    <title>Success !</title>
</head>
<body>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $lastName = $_POST["LastName"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $country = $_POST["country"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $honey = $_POST["website"];
    
    $errors = [];

    if (!empty($honey)) {
        die("Spam détecté");
    }
    
    if (empty($name)) {
        $errors[] = "Le champ Nom est requis.";
    }
    if (empty($lastName)) {
        $errors[] = "Le champ Prénom est requis.";
    }
    if (empty($gender)) {
        $errors[] = "Le champ Sexe est requis.";
    }
    if (empty($email)) {
        $errors[] = "Le champ Email est requis.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Le champ Email n'est pas valide.";
    }
    if (empty($country)) {
        $errors[] = "Le champ Pays est requis.";
    }
    if (empty($subject)) {
        $errors[] = "Le champ Sujet est requis.";
    }
    if (empty($message)) {
        $errors[] = "Le champ Message est requis.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p class=\"error\">$error</p>";
        }
    } else {
        try {
            $mail = new PHPMailer(true);

            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'feys.dylan.dev@gmail.com';
            $mail->Password = 'tnhx yduo zelr ckwk';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->setFrom($email);
            $mail->addAddress("feys.dylan.dev@gmail.com");
            $mail->isHTML(true);
            $mail->Subject = "Nouveau message de $name $lastName, $subject";
            $mail->Body =   "Nom: $name \n".
                            "Prénom: $lastName \n".
                            "Sexe: $gender \n".
                            "Email: $email \n".
                            "Pays: $country \n".
                            "Sujet: $subject \n".
                            "Message: $message\n";

            $mail->send();
            echo '
            <div class="success">
                <h1>Merci pour votre message !🎉</h1>
                <p>Nous avons bien reçu votre message, nous essayerons d\'y répondre dans les plus brefs délais !</p>
            </div>
            ';
        } catch (Exception $e) {
            echo '<p class="error">L\'envoi de l\'email a échoué. Erreur: ', $mail->ErrorInfo, '</p>';
        }
    }
}
?>
</body>
</html>



