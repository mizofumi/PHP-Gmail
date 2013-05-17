<?php
include_once dirname(__FILE__).'/class/class.gmail.php';
    
$Gmail = new Gmail();

/*
 * Subject => '件名'
 * Body => '本文'
 * Mailaddress => '送信先'
 */
$Gmail->Send('Subject', 'Body','Mailaddress');


?>   