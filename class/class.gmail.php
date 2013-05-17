<?php
include_once dirname(__FILE__).'/../libs/PHPMailer/class.phpmailer.php';

mb_language("japanese");
mb_internal_encoding("UTF-8");

class Gmail{
    //Gmail Account Settings
    public $Gmail_Address = 'hogehoge@gmail.com';
    public $Gmail_Password = 'hogehoge';
    public $Gmail_POP3_Server = 'pop.gmail.com';
    public $Gmail_POP3_Port = '995';
    public $Gmail_SMTP_Server = 'smtp.gmail.com';
    public $Gmail_SMTP_Port = '587';
    public $Gmail_SMTP_Secure = 'tls';
    //
    
    function __construct() {
        $this->mailer = new PHPMailer();
    }
    
    function __destruct() {
        $this->mailer = NULL;
    }
    
    public function Send($Subject = '無題',$Body = '本文',$To){
        $this->mailer->IsSMTP();
        try{
            
            $this->mailer->SMTPAuth = true;
            $this->mailer->SMTPSecure = $this->Gmail_SMTP_Secure;
            $this->mailer->Host = $this->Gmail_SMTP_Server;
            $this->mailer->Port = $this->Gmail_SMTP_Port;
            $this->mailer->Username = $this->Gmail_Address;
            $this->mailer->Password = $this->Gmail_Password;
            $this->mailer->Subject = $Subject;
            $this->mailer->Body = $Body;
            $this->mailer->AddAddress($To);
            $this->mailer->SetFrom($this->Gmail_Address);
            $this->mailer->Send();
            
            
        }  catch (phpmailerException $e){
            
            echo $e->errorMessage();  
            
        }  catch (Exception $e){
            
            echo $e->getMessage();
            
        }
    }
}