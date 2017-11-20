<?php
$graphListNumCvRate = [];
$graphListNum = [];
$graphReachNumReachRate = [];
$graphCvNumCvRateReached = [];

?>
<!-- ページタイトル -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= $masterProject->project_name ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- data-spy="affix" data-offset-top="160" -->
    <div class="row" id="Affix2">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">プロジェクト概況</div>
                <!-- /.panel-heading -->

                <div class="panel-body fixed-panel">


                    <table width="100%" class="table table-striped table-bordered table-hover table-scroll">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>リスト件数</th>
                            <th>接続率</th>
                            <th>接続件数</th>
                            <th>接続後成約率</th>
                            <th>成約件数</th>
                            <th>成約率</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($goldenlistProjectOverview as $entity) :?>
                        <tr>
                            <td><?= $entity->master_call_list->call_list_name;?></td>
                            <td><?= $entity->project_overview_list_number;?> 件</td>
                            <td><?= $this->ReportGraph->getRate($entity->project_overview_reach_rate);?> %</td>
                            <td><?= $entity->project_overview_reach_number;?> 件</td>
                            <td><?= $this->ReportGraph->getRate($entity->project_overview_cv_rate_reached);?> %</td>
                            <td><?= $entity->project_overview_cv_number;?> 件</td>
                            <td><?= $this->ReportGraph->getRate($entity->project_overview_cv_rate);?> %</td>
                        </tr>
                            <?php
                            // グラフ用データ作成
                            $graphListNumCvRate[] = $this->ReportGraph->getMixChartObj(
                                $entity->master_call_list->call_list_name,
                                $entity->project_overview_list_number,
                                $entity->project_overview_cv_rate
                            );
                            $graphListNum[] = $this->ReportGraph->getBarChartObj(
                                $entity->master_call_list->call_list_name,
                                $entity->project_overview_list_number
                            );

                            $graphReachNumReachRate[] = $this->ReportGraph->getMixChartObj(
                                $entity->master_call_list->call_list_name,
                                $entity->project_overview_reach_number,
                                $entity->project_overview_reach_rate
                            );
                            $graphCvNumCvRateReached[] = $this->ReportGraph->getMixChartObj(
                                $entity->master_call_list->call_list_name,
                                $entity->project_overview_cv_number,
                                $entity->project_overview_cv_rate_reached
                            );
                            ?>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->

            </div>
            <!-- /.panel .panel-default -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">プロジェクト概況グラフ</div>
                <!-- /.panel-heading -->

                <div class="panel-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="text-center">リスト件数と成約率</h3>
                            <div class="graph_size" id="graph_overview_listNum_cvRate"></div>
                        </div>
                        <!-- /.col-lg-12 (nested) -->
                    </div>
                    <!-- /.row -->


                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="text-center">リスト件数</h3>
                            <div class="graph_size" id="graph_overview_listNum"></div>
                        </div>
                        <!-- /.col-lg-12 (nested) -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="text-center">接続件数と接続率</h3>
                            <div class="graph_size" id="graph_overview_reachNum_reachRate"></div>
                        </div>
                        <!-- /.col-lg-12 (nested) -->
                    </div>
                    <!-- /.row -->


                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="text-center">成約件数と接続後成約率</h3>
                            <div class="graph_size" id="graph_overview_cvNum_cvRate"></div>
                        </div>
                        <!-- /.col-lg-12 (nested) -->
                    </div>
                    <!-- /.row -->


                </div>
                <!-- /.panel-body -->

            </div>
            <!-- /.panel .panel-default -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php $this->start('appendScript'); ?>
    <script>
        var chartInfo = {
            "graph_overview_listNum_cvRate" : {
                "keyName" : "graph_overview_listNum_cvRate",
                "balloonText" : {
                    "bar" : {
                        "title" : "リスト件数"
                    },
                    "line" : {
                        "title" : "成約率"
                    }
                },
                "valueAxes" : {
                    "bar" : {
                        "title" : "リスト件数（件）"
                    },
                    "line" : {
                        "title" : "成約率（％）"
                    }
                },
                "dataProvider" : <?= json_encode($graphListNumCvRate)?>,

            },
            "graph_overview_listNum" : {
                "keyName" : "graph_overview_listNum",
                "balloonText" : {
                    "bar" : {
                        "title":"リスト件数"
                    }
                },
                "dataProvider": <?= json_encode($graphListNum)?>
            },
            "graph_overview_reachNum_reachRate" : {
                "keyName" : "graph_overview_reachNum_reachRate",
                "balloonText" : {
                    "bar" : {
                        "title" : "接続件数"
                    },
                    "line" : {
                        "title" : "接続率"
                    }
                },
                "valueAxes" : {
                    "bar" : {
                        "title" : "接続件数（件）"
                    },
                    "line" : {
                        "title" : "接続率（％）"
                    }
                },
                "dataProvider" : <?= json_encode($graphReachNumReachRate)?>,
            },
            "graph_overview_cvNum_cvRate" : {
                "keyName" : "graph_overview_cvNum_cvRate",
                "balloonText" : {
                    "bar" : {
                        "title" : "成約件数"
                    },
                    "line" : {
                        "title" : "接続後成約率"
                    }
                },
                "valueAxes" : {
                    "bar" : {
                        "title" : "成約件数（件）"
                    },
                    "line" : {
                        "title" : "接続後成約率（％）"
                    }
                },
                "dataProvider" : <?= json_encode($graphCvNumCvRateReached)?>,
            }
        };
        renderMixChart(chartInfo.graph_overview_listNum_cvRate, true);
        renderColumnChart(chartInfo.graph_overview_listNum, true);
        renderMixChart(chartInfo.graph_overview_reachNum_reachRate, true);
        renderMixChart(chartInfo.graph_overview_cvNum_cvRate, true);
    </script>
    <?php $this->end();?>