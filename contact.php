<?php 
$errors = '';
$myemail = 'discoveryworldtours@gmail.com, arannyanishidin@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}
// Veriable declearation to stor web data ( Jha info )
$name = $_POST['name']; 
$email_address = $_POST['email']; 
$message = $_POST['message'];
$Phone = $_POST['phone']; // This field add by jha@gmail
// Subject field off by jha to track source of the visitor
//$subject = $_POST['subject'];

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Queried comes from Arannya Nishidin; by : $name";
	$email_body = "You have received a new message from Web Visitor. \n ".
	"Name: $name \n Email: $email_address \n Phone : $Phone \n Message \n $message"; 
	
	$headers = "From: $email_address\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	//header('Location: contact-form-thank-you.html');
	//header('Location: contact.html');
	echo "<script>
				alert('Thank you, message successfully reach to us. Will get back to you soon');
				window.location.href='index.html';
		  </script>";

} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>