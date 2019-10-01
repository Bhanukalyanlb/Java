<?php

function getRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }
    return 'IA'.$string;
}
$code = "";
for ($i = 0; $i < 250; $i++) {
    $uniqueCode = strtoupper(getRandomString());
    // echo $uniqueCode."</br>";
    $code .= $uniqueCode.PHP_EOL;
}
$fileUrl = "code_".time().".txt";
file_put_contents($fileUrl, $code, FILE_APPEND);
// header('Location: '.$fileUrl);

if(file_exists($fileUrl)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($fileUrl).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($fileUrl));
    flush(); // Flush system output buffer
    readfile($fileUrl);
    exit;
}