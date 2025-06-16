<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate input
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Email format and injection check
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || preg_match("/[\r\n]/", $email)) {
            echo "Invalid email format.";
            exit();
        }

        $to = "your-email@example.com"; // 🔁 Replace with your actual email
        $subject = "New Contact Form Submission from $name";
        $body = "Name: $name\nEmail: $email\nMessage:\n$message\n\nSent on: " . date('Y-m-d H:i:s');
        $headers = "From: no-reply@yourdomain.com\r\n"; // optional: replace domain
        $headers .= "Reply-To: $email\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        if (mail($to, $subject, $body, $headers)) {
            header("Location: thank-you.html");
            exit();
        } else {
            echo "Failed to send message. Please try again later.";
        }
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request method.";
}
?>
