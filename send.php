<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Mail Gönder</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
    <style>
        body{
            padding-top: 50px;
        }
    </style>
</head>
<body>

<?php
    if (isset($_POST['send']))
    {
        $Mailer='smtp';
        $Host='ssl://smtp.gmail.com';
        $Port='465';
        $SMTPAuth='true';//true /false
        $Username='*******';
        $Password='********';
        $From='/*epostanızı yazın*/';

        require_once('class.phpmailer.php');
        $mail = new PHPMailer();
        $mail->Mailer  = $Mailer;
        $mail->Host    = $Host;
        $mail->Port    = $Port;
        $mail->SMTPAuth     = $SMTPAuth;
        $mail->Username = $Username;
        $mail->Password = $Password;
        $mail->From = $From;
        $mail->FromName = $_POST['ad'].' '. $_POST['soyad'];
        $mail->CharSet = 'UTF-8';
        $mail->Subject = $_POST['konu'];
        $mail->AddAddress($From);
        $mail->IsHTML(true);
        $mail->Body = 'Konu: ' . $_POST['konu'] . '<br>' . 'Mesaj: ' . $_POST['mesaj'];
        $mail->Send();
        if ($mail->Send()){
            echo '
                <div class="alert alert-success" role="alert">
                  Mesaj Gönderme Başarılı.
                </div>
            ';
        }else{
            echo '
                <div class="alert alert-danger" role="alert">
                  Mesajınız Gönderilemedi. Hata : ' . $mail->ErrorInfo .'
                </div>
            ';
        }
    }

?>
    <div class="container">
        <div class="alert alert-info text-center text-uppercase" role="alert">
            Php mail gönderme formu
        </div>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" name="ad" class="form-control" placeholder="Adınız" required>
            </div>
            <div class="form-group">
                <input type="text" name="soyad" class="form-control" placeholder="Soyadınız" required>
            </div>
            <div class="form-group">
                <input type="text" name="konu" class="form-control" placeholder="Konu" required>
            </div>
            <div class="form-group">
                <textarea name="mesaj" class="form-control" cols="30" rows="10" required></textarea>
            </div>
            <button type="submit" name="send" class="btn btn-primary">Gönder</button>
        </form>
    </div>
</body>
</html>
