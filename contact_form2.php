<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $business_name = $_POST["bus_name"];
    $location = $_POST["hos_location"];
    $address = $_POST["hos_address"];
    $phone = $_POST["hos_phone"];
    $text = $_POST["hos_text"];

    if (!empty($name) && !empty($email) && !empty($business_name) && !empty($location) && !empty($phone) && !empty($text) && !empty($address)) {
        $to = "udemy1013@gmail.com";
        $subject = $business_name;
        $message = $text;
        $header = "Name of person: " . $name .
            "\r\nBusiness Name: " . $business_name .
            "\r\nEmail: " . $email .
            "\r\nPhone: " . $phone .
            "\r\nAdress: " . $address .
            "\r\nMessage: " . $text . "\r\n";

        if (mail($to, $subject, $header)) {
            header("Location: index.html"); // Redirect to index.html on success
            exit;
        } else {
            echo "Error sending the email.";
        }
    } else {
        header("Location: contact2.php?error=One or more fields are empty");
        exit;
    }
} else {
    // Handle the case where the form wasn't submitted via POST
    header("Location: contact2.php?error=Form not submitted");
    exit;
}
?>
