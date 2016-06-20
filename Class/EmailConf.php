<?php
//require_once "./lib/phpmail/PHPMailerAutoload.php";
/**
 * Created by PhpStorm.
 * User: Aigars
 * Date: 21.03.2016
 * Time: 19:11
 */
class EmailConf extends Database
{
    var $mail;
    var $email;
    var $username;
    var $pw;
    var $foundEmail=false;
    var $hash;
    var $id;

    function sendPw(){
        $mail = new PHPMailer;
        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->Host       = "ssl://smtp.gmail.com"; // SMTP server
        $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
            // 1 = errors and messages
            // 2 = messages only
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
        $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
        $mail->Port       = 465;                   // set the SMTP port for the GMAIL server
        $mail->Username   = "email here";  // GMAIL username
        $mail->Password   = "key here";
        $mail->FromName = "Uzskaites sistēma";
        $mail->SetFrom("Uzskaites sistēma" ,"email here");
        $mail->addAddress("{$this->email}");
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = "Sistēmas dati";
        $mail->Body = "
		<b>Jūsu piekļuves dati:</b><br/>
		<b>Lietotājvārds:</b> {$this->username}<br/>
		<b>Parole:</b> {$this->pw}";
        $mail->send();
    }
    function checkUserMail($email){
        $this->email = $this->con->real_escape_string($email);
        $sql = "SELECT lietotajvards,ID FROM lietotaji WHERE epasts = '{$this->email}'";
        $result = $this->con->query($sql);
        while($row = $result->fetch_assoc()){
            $this->foundEmail = true;
            $this->username = $row['lietotajvards'];
            $this->id= $row['ID'];
            //$this->pw = $row['parole'];
        }


    }
    function genPw(){
        $this->pw=substr(md5(rand()), 0, 7);

    }
    function getFoundEmail(){
        return $this->foundEmail;
    }

    function genAndUpdateHash(){
        $this->hash=password_hash($this->pw,PASSWORD_BCRYPT);
        $sql = ("UPDATE lietotaji SET parole = '$this->hash' WHERE ID = '$this->id'")or die($this->con->error);
        $this->con->query($sql);
    }

}

