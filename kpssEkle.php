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

$kpssPuan = floatval(strip_tags(trim(str_replace(',', '.', $_POST['kpss']))));
$tcno = strval(strip_tags(trim($_POST['tcno'])));

$tcno = md5(sha1($tcno));

if ($kpssPuan < 100 && $kpssPuan > 78)
    kpssPuanıEkle($tcno, $kpssPuan);
else {
    $response = array('status' => 'danger', 'msg' => "Geçersiz veriler");
    header('Content-Type: application/json');
    echo json_encode($response);
}
