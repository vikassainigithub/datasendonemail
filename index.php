<!-- web codding channel vedio dekhi thi email k liye-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            width:100%;
            border:1px solid red;
            display:flex;
            flex-wrap:wrap;
            justify-content:center;
        }
        div{
            background-color:yellow;
            width: 45%;
            margin-left: 2.5%;
            padding:5px;
            display:flex;
            flex-direction:row;
        }
        label{
            width:20%;
            color:green;
            font-weight:900;
            font-style:italic;
            text-transform:capitalize;
        }
        input{
            width:70%;
        }
    </style>
</head>
<body>
    <!-- <form name="frmlogin" action="process.php" method="POST"> -->
        <!--1. agr alag page per php ka code krna hai to upr wala form chlaye jiske action me process.php likha hai -->
        <!--2. agr issi page per php ka code krna hai to form data access krne k liye niche wala code chlaye  -->
        <form name="frmlogin" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" novalidate>
        <div>
            <label>user-name:</label>
            <input type="text"  name="txtname">
        </div>
        <!-- <div>
            <label>password:</label>
            <input type="password" name="txtpwd" autoComplete="off">
        </div> -->
        <div>
            <label>email:</label>
            <input type="email" name="txtemail" autoComplete="off">
        </div>
        <div>
            <label>phone:</label>
            <input type="number" name="txtphone">
        </div>
        <div>
        <label>message:</label>
        <textarea name="txtmsg" id="" cols="5" rows="2"></textarea>
        </div>
        <div>
            <input type="submit" name="btnlogin" value="login" style="padding:5px 15px; font-weight:900;">
        </div>
    </form>
    <?php
// TODAY CLASS 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='POST'){
$name  =$_POST['txtname'];
// $password  =$_POST['txtpwd'];
$email =$_POST['txtemail'];
$phone =$_POST['txtphone'];
$msg   =$_POST['txtmsg'];
// 1.USE THIS CODE FOR DOMAIN HOSTING GMAIL ID
// $message="NAME:".$name;
// $message.="<br>password:".$password;
// $message.="<br>email:".$email;
// $message.="<br>mobile no:".$phone;  
// $message.="<br>message:".$msg;
// // to=> me hum uss email id ko dalenge jo ki domain & hosting krte time bnayi thi uss website ki uss emailid ko to me fill krenge.
// $to="vikaspanwar1911@gmail.com";
// $subject ="Mail from intern ranking group";
// $headers ="MIME-Version:1.0"."\r\n";// 1.\r=carriage returs and 2.\n=new line
// $headers.="Content-type:text/html;charset=UTF-8"."\r\n";
// // or from me humne $email ka use isiliye kiya jisse ki form fill krte time jo email fill ki usko ye sab problem hai jo usne form me submit ki.
// $headers.="From:vikasrankingeek@gmail.com"."\r\n";
// $headers.="Bcc:pankajsainisaini4717@gmail.com"."\r\n";
// $headers.="Cc:abhishekrankingeek@gmail.com"."\r\n";
// if(mail($to,$subject,$message,$headers)){
//     echo "mail sent successfully";
// }
// else{
//     echo "mail is not sent successfully";
// }




//2. BY SMTP SERVER USING GITHUB

//Load Composer's autoloader
require 'php_mailer/Exception.php';
require 'php_mailer/PHPMailer.php';
require 'php_mailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'vikasrankingeek@gmail.com';                     //SMTP username
    $mail->Password   = 'nwgdbmslghiavukn';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('vikasrankingeek@gmail.com', 'contact form');
    // isme humne vo email dalni hai jha pe hume data dekhnna hai form ka ya jiske pass bhejna hai 
    $mail->addAddress('vikaspanwar1911@gmail.com', 'intergroup');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'test contact form';
    $mail->Body    = "sender name:$name<br>sender email:$email<br>phone number:$phone<br>message:$msg<br>";
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}

?>
</body>
</html>