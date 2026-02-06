<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = strip_tags(trim($_POST["name"]));
    $email   = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // E-Mail-Adresse des Obmanns
    $to = "mkag999@gmail.com";   // <-- Hier die echte E-Mail-Adresse eintragen
    $subject = "Kontaktformular Nachricht von $name";
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $email_content = "Name: $name\n";
    $email_content .= "E-Mail: $email\n\n";
    $email_content .= "Nachricht:\n$message\n";

    if(mail($to, $subject, $email_content, $headers)) {
        echo "<p style='color:#00ff00;'>Vielen Dank! Ihre Nachricht wurde gesendet.</p>";
    } else {
        echo "<p style='color:#ff1a1a;'>Fehler beim Senden. Bitte versuchen Sie es später erneut.</p>";
    }
} else {
    echo "<p style='color:#ff1a1a;'>Ungültige Anfrage.</p>";
}
?>
