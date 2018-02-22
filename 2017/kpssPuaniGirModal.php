<?php
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 22.02.2018
 * Time: 16:08
 */
?>
<div class="modal fade kpssPuanGir" tabindex="-1" role="dialog" aria-labelledby="kpssModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="kpssModalLabel">Kpss Puanı Ekle</h4>
            </div>
            <div class="modal-body" id="kpssPuanGirModalBody">
                <div class="alert alert-info" role="alert">
                    <div class="pull-left">
                        Lütfen sonucunuzu
                        <a class="alert-link" target="_blank" href="https://sonuc.osym.gov.tr/Sorgu.aspx?SonucID=4110"> 2016 KPSS sonuç
                            Sayfasından</a>
                        kopyalayarak olduğu gibi yazın.
                    </div>

                    <div class="clearfix"></div>
                </div>

                <form name="kpssPuanGir" id="kpssPuanGir" method="post" action="kpssEkle.php">
                    <div class="form-group">
                        <label for="tcno">TC NO:</label>
                        <input class="form-control" type="text" data-inputmask="'mask': '9{11}'"
                               name="tcno" id="tcno" required>
                    </div>
                    <div class="form-group">
                        <label for="kpss">Kpss Puanı:</label>
                        <input class="form-control" data-inputmask="'mask': '1{*}9{1,2}.9{1,4}'"
                               id="kpss" name="kpss" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control btn btn-default" type="submit" value="Kaydet">
                    </div>
                </form>
                <script type="text/javascript">
                    $('#kpssPuanGir').on('submit', function () {
                        $.ajax({
                            type: 'POST',
                            url: $(this).attr('action'),
                            data: $(this).serializeArray(),
                            success: function (returnData) {
                                $('#kpssPuanGirModalBody').append(
                                    '<div class="alert alert-' + returnData['status'] + ' alert-dismissable fade in">' +
                                    '<i class="fa fa-check"></i>' +
                                    '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>' +
                                    '' + returnData['msg'] +
                                    '</div>'
                                );
                                $('#kpssPuanGir')[0].reset();
                                var z = setInterval(function () {
                                    $('#kpssPuanGirModalBody .alert').alert('close');
                                }, 5000);
                            }
                        });
                        return false;
                    });
                </script>
            </div>
        </div>
    </div>
</div>
