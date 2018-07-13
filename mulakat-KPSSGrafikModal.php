<?php
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 22.02.2018
 * Time: 16:07
 */
?>
<div class="modal fade mulakat-KPSS" tabindex="-1" role="dialog" aria-labelledby="mulakat-KPSSModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="mulakat-KPSSModalLabel">Mülakat Puanlarının Frekans Grafiği</h4>
            </div>
            <div class="modal-body">
                <?php
                $labels = "[";
                $data = "[";
                foreach ($db->query("SELECT ROUND(puan-kpss) As fark,count(ROUND(puan-kpss)) AS frekans FROM liste2018 GROUP BY fark") as $row) {
                    $labels .= '"' . $row['fark'] . '",';
                    $data .= $row['frekans'] . ",";
                }
                $labels .= "]";
                $data .= "]";
                ?>
                <div>
                    <div id="farkGrafik" style="width:100%; height:400px;"></div>
                </div>
                <script>
                    $(function () {
                        var myChart = Highcharts.chart('farkGrafik', {
                            chart: {
                                type: 'line'
                            },
                            title: {
                                text: 'Mülakat-KPSS Fark grafiği'
                            },
                            xAxis: {
                                categories: <?=$labels?>
                            },
                            yAxis: {
                                title: {
                                    text: 'Mülakat-KPSS'
                                }
                            },
                            series: [{
                                name: 'Frekans',
                                data: <?=$data?>
                            }]
                        });
                    });
                </script>

            </div>
        </div>
    </div>
</div>
