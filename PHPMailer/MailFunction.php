<?php
require 'PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail1 = new PHPMailer;

$name=$_POST['name'];
$email=$_POST['email'];
$Adminmessage=$_POST['message'];
$subject=$_POST['subject'];
$schoolname=$_POST['schoolname'];
$location=$_POST['location'];
$phone=$_POST['phone'];

$lname=$_POST['lname'];

//name  email  message subject

// echo $email;
// echo $phone;
// echo $name;
// die;
//$emailadmin="sanchit2411@gmail.com";
// $emailadmin2="priyanka@scaledesk.com";
// $emailsubadmin="lakhani@scaledesk.com";
$emailadmin="nkscoder@gmail.com";
$emailsubadmin="sanchit@scaledesk.com";
// $namefrom=$_POST['pagefrom'];
//$subject = $subject;
$Usersubject="Thank You for contacting Scaledesk";
$messageUsers=file_get_contents('template.html');

$message ='<html>
<body>
<div id="abcd" style="text-align:justify;font-size:18px;"> Name:-'.$name.'<br> Email:-'.$email.'<br>Message:-'.$Adminmessage.'</div>
</body>
</html>';

if ($phone){
    $message="";
    $message ='<html>
<body>    
<div id="abcd" style="text-align:justify;font-size:18px;">
  Name:-'.$name.'<br>
  Email:-'.$email.'<br>
  School Name:-'.$schoolname.'<br>
  Location:-'.$location.'<br>
  Phone:-'.$phone.'<br>
  Message:-'.$Adminmessage.'
  </div>
</body>
</html>';
}
if ($lname){
    $message="";
    $message ='<html>
<body>    
<div id="abcd" style="text-align:justify;font-size:18px;">
  First Name:-'.$name.'<br>
  Last Name:-'.$lname.'<br>
  Email:-'.$email.'<br>
  Phone:-'.$phone.'<br>
  Message:-'.$Adminmessage.'
  </div>
</body>
</html>';
}
// $phoneMessage ='<html>
// <body>
// <div id="abcd" style="text-align:justify;font-size:18px;"><br>Phone:-'.$phone.'</div>
// </body>
// </html>';



// $Popupsubject="Ecomm - Exit Intent Modal Form";
// $popupMessage ='<html>
// <body>
// <div id="abcd" style="text-align:justify;font-size:18px;"><br>Phone/Email - :-'.$popupEmail.'</div>
// </body>
// </html>';
/*$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.scaledesk.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'contact@scaledesk.com';                 // SMTP username
$mail->Password = 'qazplmq1w2e3r4';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;
$mail->IsHTML(true);  */
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'sub5.mail.dreamhost.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'contact@scaledesk.com';                 // SMTP username
$mail->Password = 'qazplmq1w2e3r4';                           // SMTP password
//$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;// TCP port to connect to
$mail->IsHTML(true);
$mail->setFrom('contact@scaledesk.com', '3D Print');
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('contact@scaledesk.com', 'noreply');
// TCP port to connect to
/*$mail1->isSMTP();                                      // Set mailer to use SMTP
$mail1->Host = 'mail.scaledesk.com';  // Specify main and backup SMTP servers
$mail1->SMTPAuth = true;                               // Enable SMTP authentication
$mail1->Username = 'contact@scaledesk.com';                 // SMTP username
$mail1->Password = 'qazplmq1w2e3r4';                           // SMTP password
$mail1->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail1->Port = 587;
$mail1->IsHTML(true);
*/

$mail1->isSMTP();                                      // Set mailer to use SMTP
$mail1->Host = 'sub5.mail.dreamhost.com';  // Specify main and backup SMTP servers
$mail1->SMTPAuth = true;                               // Enable SMTP authentication
$mail1->Username = 'contact@scaledesk.com';                 // SMTP username
$mail1->Password = 'qazplmq1w2e3r4';                           // SMTP password
//$mail1->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail1->Port = 587;// TCP port to connect to
$mail1->IsHTML(true);
$mail1->setFrom('contact@scaledesk.com', '3D Print');
//$mail->setFrom('contact@scaledesk.com', 'Scaledesk');
$mail->addAddress($email, $name);
//$mail1->setFrom('contact@scaledesk.com', 'Scaledesk');
$mail1->addAddress($emailadmin);     // Add a recipient
// $mail1->addAddress($emailadmin2);     // Admin mail
$mail1->addAddress($emailsubadmin);  // sub admin mail

$mail->Subject = $Usersubject;
$mail->Body    = $messageUsers;
$mail1->Subject = $subject;
$mail1->Body    = $message;
// echo "<pre/>";
// print_r($mail1);die;

// $mail1->SMTPDebug = 1;
// $mail1->SMTPDebug  = 2;






if($mail1->send())
{

    if($mail->send()){
        echo ('success');
    }else{
        echo ('success');
    }

}else{

    // echo $mail1->ErrorInfo;

    header( "location: /3dprint/");



}