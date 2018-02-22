<?php
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 22.02.2018
 * Time: 16:07
 */
?>
<div class="modal fade  mukalatFrekans" tabindex="-1" role="dialog" aria-labelledby="mulakatFrakansModalLabel">
    <div class="modal-dialog modal-lg" role="document">
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
                <div id="container" style="width:100%; height:400px;"></div>
                <script>
                    $(function () {
                        var myChart = Highcharts.chart('container', {
                            chart: {
                                type: 'line'
                            },
                            title: {
                                text: 'P10 Frekans Grafiği'
                            },
                            xAxis: {
                                categories: <?=$labels?>
                            },
                            yAxis: {
                                title: {
                                    text: 'P10 Puanı'
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
