<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $lastName = $_POST["LastName"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $country = $_POST["country"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $honey = $_POST["website"];

    if(!empty($honey)){
        die("Spam détecté")
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
            echo "<p>$error</p>";
        }
    } else {
        $to = "feys.dylan.dev@gmail.com";

        $subject = "Nouveau message de $name $lastName";

        $message = "Nom: $name\n".
                    "Prénom: $lastName\n".
                    "Sexe: $gender\n".
                    "Email: $email\n".
                    "Pays: $country\n".
                    "Sujet: $subject\n".
                    "Message: $message\n";

        $headers = "From: $email";

        if (mail($to, $subject, $message, $headers)) {
            echo `<p class="sucess">Email envoyé avec succès</p>`;
        } else {
            echo `<p class="error">L'envoi de l'e-mail a échoué</p>`;
        }
    }  
}
?>
