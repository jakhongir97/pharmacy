<?php
$name2 = htmlspecialchars($_POST['name2']);
$message2 = htmlspecialchars($_POST['message2']);
$email2 = htmlspecialchars($_POST['email2']);

if($name2 == '' || $email2 == '' || $subject == '' || $message == ''){
    echo 'Fill All fields'
    exit;
}
$headers = "From: $email2\r\nReply-to: $email2\r\nContent-type: text/html; charset=utf-8\r\n ";
if(mail("jakhongir.nematov97@gmail.com",$message,$headers))
echo "Sent";
else
    echo "Not Sent";
?>
