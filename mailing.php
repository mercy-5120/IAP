<?php
require_once 'ClassAutoLoad.php';

 $conf = [
   'smtp_host' => 'smtp.gmail.com',
   'smtp_user' => 'your_email@gmail.com',
   'smtp_pass' => 'ohxl wujn okhn wikw
',
   'smtp_port' => 465
 ];

$mailCnt = [
    'name_from' => 'Tech Community',
    'email_from' => 'your_email@gmail.com',
    'name_to' => 'Muthoni Gashi',
    'email_to' => 'msogash@gmail.com',
    'subject' => 'Welcome to Tech Community',
    'body' => 'Welcome to Tech Community.  We are excited to have you with us! This is a new academic season. 
          <b>Let\'s make the most of it and strive for excellence!</b>'];

  $ObjSendMail = new SendMail();
$ObjSendMail->Send_Mail($conf, $mailCnt);