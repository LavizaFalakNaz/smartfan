<?php
require "PHPMailer/PHPMailerAutoload.php";

function smtpmailer($to, $from, $from_name, $subject, $body)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true; 
 
        $mail->SMTPSecure = 'auto'; 
        $mail->Host = 'smtpout.secureserver.net';
        $mail->Port = 465;  
        $mail->Username = 'hello@lavizadevelops.com';
        $mail->Password = 'HelloWorld@123';   
   
   //   $path = 'reseller.pdf';
   //   $mail->AddAttachment($path);
   
        $mail->IsHTML(true);
        $mail->From="hello@lavizadevelops.com";
        $mail->FromName=$from_name;
        $mail->Sender=$from;
        $mail->AddReplyTo($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
        if(!$mail->Send())
        {
            $error ="Please try Later, Error Occured while Processing...";
            return $error; 
        }
        else 
        {
             if(isset($_GET['term']))
             {
                    header("Location: users/admin/roles.php?msg=Verification email has been sent to the User");
                    exit();
             }
             header("Location: nav/register.php?msg=Success");
             exit();
        }
    }
    
    $vkey = $_GET['vkey'];
    $to   = 'hello@lavizadevelop.com';
    $from = $_GET['username'];
    $name = 'Auto email - Smart Fans';
    $subj = 'Email Verification from Smart Fans';
    $msg = "
          <h3>Thankyou for choosing Smart Fans</h3>
          <p>We received a registration request from your email and this email is sent to confirm your registration. 
          <a href='https://smartfan-dashboard.herokuapp.com/dashboard/nav/verify.php?vkey=$vkey'>
          Click here to Verify your account 
          </a>
          <hr>
          <p>Please ignore this email if you have already verified your account</p>
          <p><strong>If you received this email without consent or have not registered for SmartFans, please dont click on the provided link as the malicious user may get access to your account unintentionally. Please discard this email immediately.</strong><p>
     ";
    
    $error=smtpmailer($to,$from, $name ,$subj, $msg);
    
?>