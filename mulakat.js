/**
 * Created by sametatabasch on 19.05.2017.
 */

(function () {
    if (location.pathname == "/sinavlar/sorgu/diger/Ss/2017/sozlesmeli_sonuc_fertdty345tr/Ss_No.asp") {

        var puan = document.getElementsByTagName('table')[2].childNodes[1].childNodes[4].innerText.replace(/[^\d.]/g, '');
        var brans = document.getElementsByTagName('table')[2].childNodes[1].childNodes[8].innerText.split("\n")[1].trim();
        var tcno = document.getElementsByTagName('table')[2].childNodes[1].childNodes[0].innerText.split("\n")[1].trim();

        console.log(puan);
        console.log(brans);
        console.log(tcno);

        document.getElementsByTagName("body").item(0).innerHTML += '<div id="window" style="position: fixed;left: 50%;top: 50%;width: 600px;margin-left: -300px;background: #fff;border: 1px solid;padding: 3px;box-shadow: 0px 1px 12px 2px #000;">' +
            '<div class="msg" style="text-align: center;font-size: 2em;"></div><div class="clear"></div><button class="yes button" style="margin: 15px auto;display: block;">Listeye Ekle</button>' +
            '</div>';

        document.querySelector('#window .msg').innerHTML = puan + " olan Mülakat puanınız BÖTE Mülakat Sıralamasına kaydedilecek!";
        /*yes ve no butonları tıklama dinleyicisi ekle*/
        document.querySelector('.yes').addEventListener('click',
            function () {
                alert('test');
                document.querySelector('#window .msg').innerHTML = '<iframe src="https://botemulakatsiralamasi.gencbilisim.net/ekle.php?p=' + puan + '&t=' + tcno + '&b=' + brans + '" width="100%" height="100%">';
            });
    } else {
        alert("Bu kod sadece 2017 Mülakatları için kullanılır.")
    }
})();