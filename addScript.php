<?php
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 25.05.2017
 * Time: 14:53
 */
echo  '(function () {
    // 2018 mulakatı için hostname ile kontrol etmek daha hızlı sabah sabah vaktim yok :)
    if (location.hostname === "www.meb.gov.tr") {

        // kpss de direk alınsın dersen bu sene kolaylık olabilir gene de sen bilirsin
        var kpss = document.getElementsByTagName("table")[0].childNodes[1].childNodes[14].innerText.replace(/[^\d.]/g, "");
        var puan = document.getElementsByTagName("table")[0].childNodes[1].childNodes[16].innerText.replace(/[^\d.]/g, "");
        var brans = document.getElementsByTagName("table")[0].childNodes[1].childNodes[8].childNodes[3].innerText.replace(/[*]/g, "").trim();
        var tcno = document.getElementsByTagName("table")[0].childNodes[1].childNodes[0].innerText.replace(/[^\d.]/g, "");

        if (brans === "Bilişim Teknolojileri") {
            document.getElementsByTagName("body").item(0).innerHTML += "<div id=\"window\" style=\"position: fixed;left: 50%;top: 50%;width: 600px;margin-left: -300px;background: #fff;border: 1px solid;padding: 3px;box-shadow: 0px 1px 12px 2px #000;\">" +
                "<div class=\"msg\" style=\"text-align: center;font-size: 2em;\"></div><div class=\"clear\"></div><button class=\"yes button\" style=\"margin: 15px auto;display: block;\">Listeye Ekle</button>" +
                "</div>";

            document.querySelector("#window .msg").innerHTML = puan + " olan Mülakat puanınız BÖTE Mülakat Sıralamasına kaydedilecek!";
            /*yes ve no butonları tıklama dinleyicisi ekle*/
            document.querySelector(".yes").addEventListener("click",
                function () {
                    var url = encodeURI("https://botemulakatsiralamasi.gencbilisim.net/ekle.php?p=" + puan + "&t=" + tcno + "&b=" + brans + "");
                    document.querySelector("#window .msg").innerHTML = "<iframe src=\"" + url + "\" width=\"100%\" height=\"100%\">";
                });
        } else alert("Bu kod sadece Bilişim Teknolojileri branşı için geçerlidir.");
    } else {
        alert("Bu kod sadece 2018 Mülakatları için kullanılır.")
    }
})();';
