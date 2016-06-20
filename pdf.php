<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php
//ini_set('display_errors', 0);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

include("Class/Database.php");
include("lib/mpdf60/mpdf.php");
include("Class/pdfClass.php");

$i = 0;
//if(isset($_POST['apstiprinat'])) {

    //pārbauda vai ir saņemta vērtība apstiprinājums
    $text = new pdfClass();
    $text->selectTextforPDF();

    $html = "".$text->getTextForPDF()."";
    $mpdf = new mPDF('utf-8');
    $mpdf->SetHeader('Mācību priekšmeti un skolotāji {DATE D-M-Y}');
    $mpdf->setFooter('{PAGENO}');
    $mpdf->useOnlyCoreFonts = true;
    $mpdf->SetDisplayMode('fullpage');
    $stylesheet = file_get_contents('./lib/bootstrap-3.3.6-dist/css/bootstrap.css'); //css pievienošana
    $mpdf->WriteHTML($stylesheet, 1);
    $mpdf->WriteHTML($html);
    $mpdf->Output();
    exit;

//} //if beigas

//else {
   // echo "Izdrukas apstiprinājums nav saņemtsaaaaaaaaaaaaa!";
//}
?>

</body>
</html>