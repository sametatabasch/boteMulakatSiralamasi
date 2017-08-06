<?php
error_reporting(E_ALL);
if (!ini_get('display_errors')) {
    ini_set('display_errors', 1);
}
require_once "veriler.php";
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 04.01.2014
 * Time: 22:20
 */
try {
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUserName, $dbPassWord, $options);
} catch (PDOException $e) {
    echo 'Hata: ' . $e->getMessage();
}

function listeyeEkle($puan, $tcno, $brans)
{
    global $db;
    $tarih = date('d.m.Y');
    $kpss = 0;
    try {
        $query = $db->prepare("REPLACE INTO liste (puan,kpss,tcno,brans,tarih) VALUES (:puan,:kpss,:tcno,:brans,:tarih)");
        $query->bindParam(':puan', $puan);
        $query->bindParam(':kpss', $kpss);
        $query->bindParam(':tcno', $tcno);
        $query->bindParam(':brans', $brans);
        $query->bindParam(':tarih', $tarih);
        $query->execute();
    } catch (PDOException $e) {
        die('Hata: ' . $e->getMessage());
    }
}

/**
 * @param $tcno
 * @param $kpss
 * @return array
 */
function kpssPuanıEkle($tcno, $kpss)
{
    global $db;
    $tarih = date('d.m.Y');
    try {
        $query = $db->prepare("UPDATE liste SET tarih=:tarih, kpss=:kpss WHERE tcno=:tcno");
        $query->bindParam(':tarih', $tarih, PDO::PARAM_STR);
        $query->bindParam(':kpss', $kpss);
        $query->bindParam(':tcno', $tcno, PDO::PARAM_STR);
        $query->execute();
    } catch (PDOException $e) {
        return $response = array('status' => 'danger', 'msg' => 'Hata: ' . $e->getMessage());
    }
    if ($query->rowCount() > 0)
        return $response = array('status' => 'success', 'msg' => "KPSS Puanı eklenmiştir");
    else return $response = array('status' => 'danger', 'msg' => '<b class="text-center">Mülakat Puanınız listede bulunamadı.</b> <br> İlk olarak <a href="http://bit.ly/2rDItjA" class="alert-link">http://bit.ly/2rDItjA</a> bağlantıda anlatıldığı gibi mülakat puanınızı listeye eklemelisiniz.');
}