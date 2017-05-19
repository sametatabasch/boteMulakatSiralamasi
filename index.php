<?php include_once 'functions.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>BÖTE Tüm alanlar dahil braş Sıralaması</title>
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
</head>
<body>
<div class="container">
    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">Branş Sıralaması</div>
        <div class="panel-body">
            <!-- Table -->
            <table id="siralamaListesi" class="table table-responsive table-striped table-bordered dataTable">
                <thead>
                <th>Sıra</th>
                <th>Puan</th>
                <th>Genel Sıralama</th>
                <th>Branş</th>
                </thead>
                <tbody>
                <?php $s = 1;
                foreach ($db->query("SELECT puan,brans FROM liste ORDER BY puan ASC ") as $row): ?>
                    <tr>
                        <td><?= $s ?></td>
                        <td><?= $row['puan'] ?></td>
                        <td><?= $row['brans'] ?></td>
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

</body>
</html>
