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
    <script type="text/javascript" src="js/jquery.inputmask.bundle.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
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
                    <a class="alert-link" href="https://sonuc.osym.gov.tr/Sorgu.aspx?SonucID=4110"> 2016 KPSS sonuç
                        Sayfasından</a>
                    kopyalayarak olduğu gibi yazın.
                </div>

                <div class="btn-group pull-right">
                    <button type="button" class="btn  btn-success pull-right" data-toggle="modal"
                            data-target=".kpssPuanGir">KPSS Puanı ekle
                    </button>
                </div>
                <div class="modal fade kpssPuanGir" tabindex="-1" role="dialog" aria-labelledby="kpssModalLabel">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="kpssModalLabel">Kpss Puanı Ekle</h4>
                            </div>
                            <div class="modal-body" id="kpssPuanGirModalBody">
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
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
            <div class="well">Mülakat Puanlarının Frekans Grafiğini Görmek için sağdaki butona tıklayın.
                <div class="btn-group pull-right">
                    <button type="button" class="btn  btn-info pull-right" data-toggle="modal"
                            data-target=".mukalatFrekans">Mülakat Puan Frekansları
                    </button>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- Table -->
            <table id="siralamaListesi" class="table table-responsive table-striped table-bordered dataTable">
                <thead>
                <th>Sıra</th>
                <th>Mülakat</th>
                <th>KPSS</th>
                <th>Branş</th>
                <th>Ekleme Tarihi</th>
                </thead>
                <tbody>
                <?php $s = 1;
                foreach ($db->query("SELECT puan,brans,tarih,kpss FROM liste ORDER BY puan DESC, kpss DESC ") as $row): ?>
                    <tr>
                        <td><?= $s ?></td>
                        <td><?= $row['puan'] ?></td>
                        <td><?= $row['kpss'] ?></td>
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

<!-- Grafik modal-->

<div class="modal fade mukalatFrekans" tabindex="-1" role="dialog" aria-labelledby="mulakatFrakansModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="mulakatFrakansModalLabel">Mülakat Puanlarının Frekans Grafiği</h4>
            </div>
            <div class="modal-body">
                <?php
                $labels = "[";
                $data = "[";
                foreach ($db->query("SELECT puan,count(*) AS frekans  FROM `liste` GROUP BY puan ORDER BY puan") as $row) {
                    $labels .= '"' . $row['puan'] . '",';
                    $data .= $row['frekans'] . ",";
                }
                $labels .= "]";
                $data .= "]";
                ?>
                <canvas id="myChart" width="400" height="400"></canvas>
                <script>
                    var ctx = document.getElementById("myChart");
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: <?= $labels ?>,
                            datasets: [{
                                label: '# Frekans Değeri',
                                data: <?= $data ?>,
                                backgroundColor: 'rgba(54, 162, 235, 0.4)',
                                borderColor: 'rgba(0, 38, 255, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                </script>

            </div>
        </div>
    </div>
</div>


<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(":input").inputmask();
    });
</script>
</body>
</html>
