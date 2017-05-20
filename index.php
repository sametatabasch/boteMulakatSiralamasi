<?php include_once 'functions.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>BÖTE Mülakat Sıralaması</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <script src="js/jquery-1.12.3.js"></script>

    <!-- Datatable -->
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs/jqc-1.12.3/dt-1.10.12/datatables.min.css"/>

    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs/jqc-1.12.3/dt-1.10.12/datatables.min.js"></script>


    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <meta name="author" content="Samet ATABAŞ">
    <meta charset="utf-8"/>
    <!-- Google İzleme kodu -->
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-75339179-1', 'auto');
        ga('send', 'pageview');

    </script>

</head>
<body>
<div class="container">
    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">
            <h3 class="panel-title">BÖTE Mülakat Sıralaması</h3>

        </div>
        <div class="panel-body">
            <div class="alert alert-info" role="alert">
                <div class="pull-left">
                    Lütfen sonucunuzu
                    <a class="alert-link" href="https://sonuc.osym.gov.tr/Sorgu.aspx?SonucID=4110"> 2016 KPSS sonuç Sayfasından</a>
                    kopyalayarak olduğu gibi yazın.
                </div>

                <div class="btn-group pull-right">
                    <button type="button" class="btn  btn-success pull-right" data-toggle="modal" data-target=".kpssPuanGir">KPSS Puanı ekle</button>
                </div>
                <div class="modal fade kpssPuanGir" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            YAPIM AŞAMASINDA
                            <form>
                                <div class="form-group">
                                    <label for="tcno">TC NO:</label>
                                    <input class="form-control" type="number" maxlength="11" name="tcno" idtcno>
                                </div>
                                <div class="form-group">
                                    <label for="kpss">Kpss Puanı:</label>
                                    <input class="form-control" type="number" id="kpss" name="kpss">
                                </div>
                                <div class="form-group">
                                    <input class="form-control btn btn-default" type="submit" value="Kaydet">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- Table -->
            <table id="siralamaListesi" class="table table-responsive table-striped table-bordered dataTable">
                <thead>
                <th>Sıra</th>
                <th>Puan</th>
                <th>Branş</th>
                <th>Ekleme Tarihi</th>
                </thead>
                <tbody>
                <?php $s = 1;
                foreach ($db->query("SELECT puan,brans,tarih FROM liste ORDER BY puan DESC ") as $row): ?>
                    <tr>
                        <td><?= $s ?></td>
                        <td><?= $row['puan'] ?></td>
                        <td><?= $row['brans'] ?></td>
                        <td><?= $row['tarih'] ?></td>
                    </tr>
                    <?php $s++; endforeach; ?>
                </tbody>
            </table>

            <script type="text/javascript">
                $(document).ready(function () {
                    $('#siralamaListesi').DataTable({
                        "language": {
                            "sProcessing": "İşleniyor...",
                            "sLengthMenu": "Sayfada _MENU_ Kayıt Göster",
                            "sZeroRecords": "Eşleşen Kayıt Bulunmadı",
                            "sInfo": "  _TOTAL_ Kayıttan _START_ - _END_ Arası Kayıtlar",
                            "sInfoEmpty": "Kayıt Yok",
                            "sInfoFiltered": "( _MAX_ Kayıt İçerisinden Bulunan)",
                            "sInfoPostFix": "",
                            "search": "Bul:",
                            "sUrl": "",
                            "oPaginate": {
                                "sFirst": "İlk",
                                "sPrevious": "Önceki",
                                "sNext": "Sonraki",
                                "sLast": "Son"
                            }
                        },
                        "pageLength": 25,
                    });
                });
            </script>
        </div>
        <div class="panel-footer">
            <a class="pull-right" href="http://gencbilisim.net">Samet Atabaş - GençBilişim.net</a>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
