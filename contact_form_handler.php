<?php
// SERVER-SIDE FORM VALIDATION
$errors = '';
$myemail = 'sarahwu410@gmail.com';

if (empty($_POST['first-name']) || 
    empty($_POST['last-name']) ||
    empty($_POST['email']) || 
    empty($_POST['subject-line']) ||
    empty($_POST['message'])) {
    $errors .= "Error: All fields are required.\n";
}

$first_name = htmlspecialchars($_POST['first-name']);
$last_name = htmlspecialchars($_POST['last-name']);
$email_address = htmlspecialchars($_POST['email']);
$subject_line = htmlspecialchars($_POST['subject-line']);
$message = htmlspecialchars($_POST['message']);

if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
    $errors .= "Error: Invalid email address.\n";
}

// SENDING THE EMAIL
if (empty($errors)) {
    $to = $myemail;
    $email_subject = "Online form submission: $subject_line";
    $email_body = "You have received a new message.\n\n".
                  "Here are the details:\n".
                  "First Name: $first_name\n".
                  "Last Name: $last_name\n".
                  "Email: $email_address\n".
                  "Message:\n$message";

    $headers = "From: $myemail\n";
    $headers .= "Reply-To: $email_address";

    if (mail($to, $email_subject, $email_body, $headers)) {
        // Redirect to the 'thank you' page
        header('Location: contact-form-thank-you.html');
        exit();
    } else {
        echo "Error: Unable to send email. Please try again later.";
    }
} else {
    echo nl2br($errors); // Display errors to the user
}
?>