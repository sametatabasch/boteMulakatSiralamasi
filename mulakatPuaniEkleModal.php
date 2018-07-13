<?php
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 22.02.2018
 * Time: 16:09
 */
?>
<div class="modal fade  mulakatPuaniEkle" tabindex="-1" role="dialog" aria-labelledby="mulakatPuaniEkleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="mulakatPuaniEkleModalLabel">Mülakat Puanı Nasıl Eklenir</h4>
            </div>
            <div class="modal-body">
                <p>
                <ol>
                    <li>İlk olarak aşağıdaki kodların tamamını kopyalayın
                        <pre>
                            (function () {
    var s = document.createElement("script");
    s.src = "http://botemulakatsiralamasi.gencbilisim.net/addScript.php";
    document.body.appendChild(s);
})();
                        </pre>
                    </li>
                    <li>Sonrasında <a
                            href="http://www.meb.gov.tr/sinavlar/sonuc/sorgu.php?SINAV_ID=AF790FD1749F8A2A6A876F0EEEB7DC2D" target="_blank">mülakat
                            sonuç sayfasına</a> kimlik numaranızı yazarak giriş yapın.
                    </li>
                    <li>Mülakat sonucunuzun bulunduğu sayfada adres çubuğunu temizleyin ve javascript: yazıp hemen
                        peşine kodu yapıştırın ve enter a basın.
                    </li>
                    <li>Ekranda açılan pencerede listeye ekle butonuna tıkladığınızda puanınız listeye eklenecektir.
                    </li>
                </ol>
                </p>
            </div>
        </div>
    </div>
</div>
