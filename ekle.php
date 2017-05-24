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
require_once "functions.php";

$puan = floatval(strip_tags(trim(str_replace(',', '.', $_POST['puan']))));
$tcno = strval(strip_tags(trim($_POST['tcno'])));
$brans = strval(strip_tags(trim($_POST['brans'])));

$tcno= md5(sha1($tcno));
if ($puan<100 && $puan>60 && $brans==="Bilişim Teknolojileri"){
    listeyeEkle($puan, $tcno, $brans);
    $response = array('status' => 'successs', 'msg' => "Puanınız Listeye eklendi");
    header('Content-Type: application/json');
    echo json_encode($response);
}
else{
    $response = array('status' => 'danger', 'msg' => "Hatalı Giriş!");
    header('Content-Type: application/json');
    echo json_encode($response);
}
