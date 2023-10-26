<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["user_name"];
    $email = $_POST["user_email"];
    $prefecture = $_POST["user_prefecture"];
    $address = $_POST["user_address"];
    $phone = $_POST["user_phone"];
    $text = $_POST["user_text"];

    // Check if all fields are filled
    if (!empty($name) && !empty($email) && !empty($prefecture) && !empty($address) && !empty($phone) && !empty($text)) {
        $to = "udemy1013@gmail.com";
        $subject = $prefecture;
        $message = $text;
        $header = "Name: " . $name .
            "\r\nEmail: " . $email .
            "\r\nPhone: " . $phone .
            "\r\nAddress: " . $address .
            "\r\nMessage: " . $message . "\r\n";

        if (mail($to, $subject, $header)) {
            header("Location: index.html"); // Redirect to index.html on success
            exit;
        } else {
            echo "Error sending the email.";
        }
    } else {
        header("Location: contact.php?error=One or more fields are empty");
        exit;
    }
} else {
    // Handle the case where the form wasn't submitted via POST
    header("Location: contact.php?error=Form not submitted");
    exit;
}
?>
