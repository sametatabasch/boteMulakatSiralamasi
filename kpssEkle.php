<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
error_reporting(E_ALL);
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 20.08.2016
 * Time: 18:51
 */
require_once "functions.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>BÖTE Mülakat Sıralaması</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <meta name="author" content="Samet ATABAŞ">
    <meta charset="utf-8"/>
</head>
<body>
<?php
$kpssPuan = floatval(strip_tags(trim(str_replace(',', '.', $_POST['kpss']))));
$tcno = strval(strip_tags(trim($_POST['tcno'])));

$tcno= md5(sha1($tcno));

if ($puan<100 && $puan>78)
    kpssPuanıEkle($tcno,$kpssPuan);
else{
    $response= array('status'=>'success','msg'=>"Geçersiz veriler");
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>

<h3 class=""> Kayıt edilen puan = <?= $puan ?></h3>
<a class="btn btn-default center-block" href="/" target="_blank">Listeyi Gör</a>
</body>
</html>
