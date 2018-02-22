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
                <p> Bilgisayarında FireFox tarayıcı kullananlar aşağıdaki eklentiyi kurarak Mülakat puanlarını
                    ekleyebilirler.</p>

                <a class="btn btn-lg btn-success" target="_blank" href="http://bit.ly/2rtC8um">Firefox Eklentisini indir.</a>
                <p>Firefox tarayıcı kullananlar yukarıdaki linkte bulunan eklentiyi kullanarak mülakat puanını kolayca
                    listeye ekleyebilirler.
                    Butona tıklayıp eklentiyi indirin ve çalıştırarak kurulumu yapın. Eklentiyi kurduktan sonra
                    Tarayıcınızın sağ üst köşesinde eklentinin logosu görünecektir. Mülakat sonuç sayfasına kimlik
                    numaranız ile giriş yaptıktan sonra eklenti simgesine tıklayın. sayfada açılacak penceredeki listeye
                    ekle butonuna tıkladığınızda puanınız listeye eklenecektir.</p>

                <hr>
                <p>Diğer kullanıcılar hazırlanan javascript kodunu kullanarak mülakat puanını ekleyebilir.</p>
                <p>
                <ol>
                    <li>İlk olarak <a href="https://github.com/sametatabasch/boteMulakatSiralamasi/blob/master/mulakat.js" target="_blank">buraya</a>
                        tıklayarak açılan sayfadaki kodların tamamını kopyalayın
                    </li>
                    <li>Sonrasında <a
                            href="http://www.meb.gov.tr/sinavlar/sorgu/diger/Ss/2017/sozlesmeli_sonuc_fertdty345tr/Ss_Frm.asp" target="_blank">mülakat
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
