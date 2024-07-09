 <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
$alert="";

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Enable PHP error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['submit'])) {
    // Form variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);
    
    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ranaareeb1029@gmail.com'; // Your Gmail address
        $mail->Password = 'vpirdrhaggpupcam'; // Your Gmail password or app password
        $mail->SMTPSecure ="tls";
        $mail->Port = 587;
        
        // Sender and recipient settings
        $mail->setFrom('ranaareeb1029@gmail.com');
        $mail->addAddress('ranaareeb493@gmail'); // Replace with your own email address

        $mail->isHTML(true);
        
        // Email subject and body
        $mail->Subject = 'Contact Form Submission';
        $mail->Body = "Name: $name<br>Email: $email<br><br>Message:<br>$message";
        
        // Send email
        $mail->send();
        
        echo "<script>alert('Message sent successfully.');
  
        </script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
