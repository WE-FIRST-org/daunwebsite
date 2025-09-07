<!--SERVER-SIDE FORM VALIDATION-->
$errors = '';
$myemail = 'sarahwu410@gmail.com';
if(empty($_POST['first-name']) || 
   empty($_POST['last-name']) ||
   empty($_POST['email']) || 
   empty($_POST['subject-line']) ||
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}

$first_name = $_POST['first-name'];
$last_name = $_POST['last-name'];
$email_address = $_POST['email'];
$subject_line = $_POST['subject-line'];
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}




<!--SENDING THE EMAIL-->
if( empty($errors)) {

$to = $myemail;

$email_subject = "Online form submission: $subject_line";

$email_body = "You have received a new message. ".

" Here are the details:\n First Name: $first_name, Last Name: $last_name \n ".

"Email: $email_address\n Message \n $message";

$headers = "From: $myemail\n";

$headers .= "Reply-To: $email_address";

mail($to,$email_subject,$email_body,$headers);

<!--
//redirect to the 'thank you' page

header('Location: contact-form-thank-you.html');
-->
}