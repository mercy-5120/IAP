<?php
require_once 'ClassAutoLoad.php';

$mailCnt = [
    'name_from' => 'ICS A Community',
    'email_from' => 'no-reply@icsacommunity.com',
    'name_to' => 'Muthoni Gashi',
    'email_to' => 'msogash.com',
    'subject' => 'Welcome to ICS A Community',
    'body' => 'This is a new academic. <b>Let\'s make the most of it and strive for excellence!</b>'
];

$ObjSendMail->Send_Mail($conf, $mailCnt);