<?php
require 'ClassAutoLoad.php';

// Gmail SMTP Configuration - ADD THESE LINES
$conf['smtp_host'] = 'smtp.gmail.com';
$conf['smtp_port'] = 465;
$conf['smtp_secure'] = 'ssl'; // or 'tls'
$conf['smtp_auth'] = true;
$conf['smtp_user'] = 'noreply@techcommunity.com'; // Your actual Gmail
$conf['smtp_pass'] = 'ujpe fvex lacg isvp'; // 16-char app password



$mailCnt = [
    'name_from' => 'Tech Community',
    'email_from' => 'noreply@techcommunity.com',
    'name_to' => 'Muthoni Gashi',
    'email_to' => 'msogash@gmail.com',
    'subject' => 'Welcome to Tech Community',
    'body' => 'Welcome to Tech Community.  We are excited to have you with us! This is a new academic season. 
          <b>Let\'s make the most of it and strive for excellence!</b>'];

  $ObjSendMail = new SendMail();
$ObjSendMail->Send_Mail($conf, $mailCnt);