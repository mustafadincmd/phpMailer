<?php
ini_set( 'display_errors', 1 );

error_reporting( E_ALL );

$from = "test@gmail.com";

$to = "web-2ntk8@mail-tester.com";

$subject = "PHP mail kullanımı";

$message = "PHP mail çalışıyor";

$headers = "From:" . $from;

if(mail($to, $subject, $message, $headers)){
    echo "Başarılı";
}else{
    echo "Hata";
}

?>