<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['demo-name']);
    $email = filter_var($_POST['demo-email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['demo-message']);
    $copy = isset($_POST['demo-copy']) ? "Yes" : "No";
    $human = isset($_POST['demo-human']) ? "Yes" : "No";

    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        die("All fields are required.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Email settings
    $to = "gajuarez5435@gmail.com"; // Replace with your email address
    $subject = "New Contact Form Submission";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Email body
    $body = "You have received a new message from your website contact form:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message\n\n";
    $body .= "Requested a copy: $copy";
    $body .= "Are Human: $"human";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send the message. Please try again later.";
    }
}
?>
