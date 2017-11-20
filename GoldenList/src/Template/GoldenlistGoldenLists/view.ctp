 <!-- ページタイトル -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= $masterCallList->master_project->project_name ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?= $masterCallList->call_list_name ?>の予測概要
                </div>
                <!-- /.panel-heading -->

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th class="text-center">作成日時</th>
                            <th class="text-center">リスト総件数</th>
                            <th class="text-center">獲得目標</th>
                            <th class="text-center">予測接続件数</th>
                            <th class="text-center">全件コールしたとき<br>リストポテンシャル</th>
                            <th class="text-center">獲得目標に<br>必要なコール件数</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?= $goldenlistGoldenList->overview_create_date_time->format('Y/m/d H:i:s')?></td>
                            <td><?= $goldenlistGoldenList->overview_list_number?> 件</td>
                            <td><?= $goldenlistGoldenList->cv_target_number?> 件</td>
                            <td><?= $goldenlistGoldenList->overview_expected_reach_number?> 件</td>
                            <td>
                                <?php if(empty($dummy)): ?>
                                <?= $goldenlistGoldenList->call_program_expected_cv_number_all?> 件 <strong><span class="text-danger">[ <?= $this->ReportGraph->getNumWithPnSign($goldenlistGoldenList->overview_list_potential)?> ]</span></strong>
                                <?php else:?>
                                <span class="text-danger">-</span>
                                <?php endif;?>
                            </td>
                            <td>
                                <?php if(empty($dummy)): ?>
                                <?= $goldenlistGoldenList->overview_sufficient_call_number?> 件 <strong><span class="text-danger">[ <?= $this->ReportGraph->getNumWithPnSign($goldenlistGoldenList->overview_sufficient_call_number - $goldenlistGoldenList->overview_list_number) ?>]</span></strong>
                                <?php else:?>
                                <span class="text-danger">-</span>
                                <?php endif;?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->

                    <h3 class="text-center">COLLABOS Golden Listの予測結果</h3>

                    <div class="row">
                        <?php if(empty($dummy)): ?>
                        <div class="col-lg-6">
                            <div class="graph_size" id="graph_goldenlist_expected"></div>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-6">
                            <div class="graph_size" id="graph_goldenlist_sufficient"></div>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <?php else:?>
                            <div class="graph_size"><p style="margin-top:200px;text-align: center">購入予測データをアップロードするとグラフが表示されます</p></div>
                        <?php endif;?>
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

    <div class="row" id="Affix1">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">予測数値データ</div>
                <!-- /.panel-heading -->

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th class="text-center">予測項目</th>
                            <th class="text-center">全体</th>
                            <th class="text-center">平日午前</th>
                            <th class="text-center">平日午後</th>
                            <th class="text-center">平日夜間</th>
                            <th class="text-center">休日午前</th>
                            <th class="text-center">休日午後</th>
                            <th class="text-center">休日夜間</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>リスト件数</td>
                            <td><?= $goldenlistGoldenList->call_program_list_number_all ?> 件</td>
                            <td><?= $goldenlistGoldenList->call_program_list_number_wd_am ?> 件</td>
                            <td><?= $goldenlistGoldenList->call_program_list_number_wd_pm ?> 件</td>
                            <td><?= $goldenlistGoldenList->call_program_list_number_wd_night ?> 件</td>
                            <td><?= $goldenlistGoldenList->call_program_list_number_hd_am ?> 件</td>
                            <td><?= $goldenlistGoldenList->call_program_list_number_hd_pm ?> 件</td>
                            <td><?= $goldenlistGoldenList->call_program_list_number_hd_night ?> 件</td>
                        </tr>
                        <tr>
                            <td>接続率</td>
                            <td><?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_reach_rate_all) ?> %</td>
                            <td><?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_reach_rate_wd_am)  ?> %</td>
                            <td><?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_reach_rate_wd_pm)  ?> %</td>
                            <td><?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_reach_rate_wd_night)  ?> %</td>
                            <td><?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_reach_rate_hd_am) ?> %</td>
                            <td><?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_reach_rate_hd_pm)  ?> %</td>
                            <td><?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_reach_rate_hd_night)  ?> %</td>
                        </tr>
                        <tr>
                            <td>接続件数</td>
                            <td><?= $goldenlistGoldenList->call_program_expected_reach_number_all ?> 件</td>
                            <td><?= $goldenlistGoldenList->call_program_expected_reach_number_wd_am ?> 件</td>
                            <td><?= $goldenlistGoldenList->call_program_expected_reach_number_wd_pm ?> 件</td>
                            <td><?= $goldenlistGoldenList->call_program_expected_reach_number_wd_night ?> 件</td>
                            <td><?= $goldenlistGoldenList->call_program_expected_reach_number_hd_am ?> 件</td>
                            <td><?= $goldenlistGoldenList->call_program_expected_reach_number_hd_pm ?> 件</td>
                            <td><?= $goldenlistGoldenList->call_program_expected_reach_number_hd_night ?> 件</td>
                        </tr>
                        <?php if(empty($dummy)): ?>
                        <tr>
                            <td>接続後成約率</td>
                            <td><?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_expected_cv_rate_reached_all) ?> %</td>
                            <td><?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_expected_cv_rate_reached_wd_am) ?> %</td>
                            <td><?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_expected_cv_rate_reached_wd_pm) ?> %</td>
                            <td><?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_expected_cv_rate_reached_wd_night) ?> %</td>
                            <td><?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_expected_cv_rate_reached_hd_am) ?> %</td>
                            <td><?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_expected_cv_rate_reached_hd_pm) ?> %</td>
                            <td><?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_expected_cv_rate_reached_hd_night) ?> %</td>
                        </tr>
                        <tr>
                            <td>成約件数</td>
                            <td><?= $goldenlistGoldenList->call_program_expected_cv_number_all  ?> 件</td>
                            <td><?= $goldenlistGoldenList->call_program_expected_cv_number_wd_am ?> 件</td>
                            <td><?= $goldenlistGoldenList->call_program_expected_cv_number_wd_pm ?> 件</td>
                            <td><?= $goldenlistGoldenList->call_program_expected_cv_number_wd_night ?> 件</td>
                            <td><?= $goldenlistGoldenList->call_program_expected_cv_number_hd_am ?> 件</td>
                            <td><?= $goldenlistGoldenList->call_program_expected_cv_number_hd_pm ?> 件</td>
                            <td><?= $goldenlistGoldenList->call_program_expected_cv_number_hd_night ?> 件</td>
                        </tr>
                        <?php else:?>
                            <tr>
                                <td>接続後成約率</td>
                                <td><span class="text-danger">-</span></td>
                                <td><span class="text-danger">-</span></td>
                                <td><span class="text-danger">-</span></td>
                                <td><span class="text-danger">-</span></td>
                                <td><span class="text-danger">-</span></td>
                                <td><span class="text-danger">-</span></td>
                                <td><span class="text-danger">-</span></td>
                            </tr>
                            <tr>
                                <td>成約件数</td>
                                <td><span class="text-danger">-</span></td>
                                <td><span class="text-danger">-</span></td>
                                <td><span class="text-danger">-</span></td>
                                <td><span class="text-danger">-</span></td>
                                <td><span class="text-danger">-</span></td>
                                <td><span class="text-danger">-</span></td>
                                <td><span class="text-danger">-</span></td>
                            </tr>
                        <?php endif;?>
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
                <div class="panel-heading">予測数値グラフ</div>
                <!-- /.panel-heading -->

                <div class="panel-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="text-center">リスト件数</h3>
                            <div class="graph_size" id="graph_goldenlist_list_num"></div>
                        </div>
                        <!-- /.col-lg-12 (nested) -->
                        <div class="col-lg-12">
                            <h3 class="text-center">接続件数と接続率</h3>
                            <div class="graph_size" id="graph_goldenlist_reached"></div>
                        </div>
                        <!-- /.col-lg-12 (nested) -->
                        <div class="col-lg-12">
                            <h3 class="text-center">成約件数と接続後成約率</h3>
                            <?php if(empty($dummy)): ?>
                                <div class="graph_size" id="graph_goldenlist_cv"></div>
                            <?php else:?>
                                <div class="graph_size"><p style="margin-top:200px;text-align: center">購入予測データをアップロードするとグラフが表示されます</p></div>
                            <?php endif;?>
                        </div>
                        <!-- /.col-lg-12 (nested) -->
                    </div>
                    <!-- /.row (nested) -->

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
        "graph_goldenlist_expected" : {
            "keyName" : "graph_goldenlist_expected",
            "balloonText" : {
                "bar" : {"title":null},
            },
            "dataProvider": [
                    {
                    "item": "リスト件数",
                    "number": <?= $goldenlistGoldenList->overview_list_number ?>,
                    "color": "<?= $this->ReportGraph->getBarChartColor(); ?>"
                }, {
                    "item": "予測接続件数",
                    "number": <?= $goldenlistGoldenList->overview_expected_reach_number?>,
                    "color": "<?= $this->ReportGraph->getBarChartColor(); ?>"
                }, {
                    "item": "予測成約件数",
                    "number": <?= $goldenlistGoldenList->call_program_expected_cv_number_all  ?>,
                    "color": "<?= $this->ReportGraph->getBarChartColor(); ?>"
                }]
        },
        "graph_goldenlist_sufficient" : {
            "keyName" : "graph_goldenlist_sufficient",
            "balloonText" : {
                "bar" : {"title":null},
            },
            "dataProvider": [
                {
                    "item": "獲得目標",
                    "number": <?= $goldenlistGoldenList->cv_target_number?>,
                    "color": "<?= $this->ReportGraph->getBarChartColor(); ?>"
                }, {
                    "item": "必要接続数",
                    "number": <?= $goldenlistGoldenList->overview_sufficient_reach_number?>,
                    "color": "<?= $this->ReportGraph->getBarChartColor(); ?>"
                }, {
                    "item": "必要コール件数",
                    "number": <?= $goldenlistGoldenList->overview_sufficient_call_number?>,
                    "color": "<?= $this->ReportGraph->getBarChartColor(); ?>"
                }]
        },
        "graph_goldenlist_list_num" : {
            "keyName" : "graph_goldenlist_list_num",
            "balloonText" : {
                "bar" : {
                    "title" : "リスト件数"
                }
            },
            "dataProvider" : [ 
                {
                    "item": "平日午前",
                    "number": <?= $goldenlistGoldenList->call_program_list_number_wd_am ?>,
                    "color": "<?= $this->ReportGraph->getLineChartColor(); ?>"
                }, {
                    "item": "平日午後",
                    "number": <?= $goldenlistGoldenList->call_program_list_number_wd_pm ?>,
                    "color": "<?= $this->ReportGraph->getLineChartColor(); ?>"
                }, {
                    "item": "平日夜間",
                    "number": <?= $goldenlistGoldenList->call_program_list_number_wd_night ?>,
                    "color": "<?= $this->ReportGraph->getLineChartColor(); ?>"
                },{
                    "item": "休日午前",
                    "number": <?= $goldenlistGoldenList->call_program_list_number_hd_am ?>,
                    "color": "<?= $this->ReportGraph->getLineChartColor(); ?>"
                },{
                    "item": "休日午後",
                    "number": <?= $goldenlistGoldenList->call_program_list_number_hd_pm ?>,
                    "color": "<?= $this->ReportGraph->getLineChartColor(); ?>"
                }, {
                    "item": "休日夜間",
                    "number": <?= $goldenlistGoldenList->call_program_list_number_hd_night ?>,
                    "color": "<?= $this->ReportGraph->getLineChartColor(); ?>"
                }]
        },
        "graph_goldenlist_reached" : {
            "keyName" : "graph_goldenlist_reached",
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
            "dataProvider" : [ 
                {
                    "item": "平日午前",
                    "number": <?= $goldenlistGoldenList->call_program_expected_reach_number_wd_am ?>,
                    "rate": <?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_reach_rate_wd_am) ?>,
                    "color": "<?= $this->ReportGraph->getLineChartColor(); ?>"
                }, {
                    "item": "平日午後",
                    "number": <?= $goldenlistGoldenList->call_program_expected_reach_number_wd_pm ?>,
                    "rate": <?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_reach_rate_wd_pm) ?>,
                    "color": "<?= $this->ReportGraph->getLineChartColor(); ?>"
                },{
                    "item": "平日夜間",
                    "number": <?= $goldenlistGoldenList->call_program_expected_reach_number_wd_night ?>,
                    "rate": <?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_reach_rate_wd_night) ?>,
                    "color": "<?= $this->ReportGraph->getLineChartColor(); ?>"
                },{
                    "item": "休日午前",
                    "number": <?= $goldenlistGoldenList->call_program_expected_reach_number_hd_am ?>,
                    "rate": <?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_reach_rate_hd_am) ?>,
                    "color": "<?= $this->ReportGraph->getLineChartColor(); ?>"
                }, {
                    "item": "休日午後",
                    "number": <?= $goldenlistGoldenList->call_program_expected_reach_number_hd_am ?>,
                    "rate": <?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_reach_rate_hd_pm) ?>,
                    "color": "<?= $this->ReportGraph->getLineChartColor(); ?>"
                }, {
                    "item": "休日夜間",
                    "number": <?= $goldenlistGoldenList->call_program_expected_reach_number_hd_night ?>,
                    "rate": <?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_reach_rate_hd_night) ?>,
                    "color": "<?= $this->ReportGraph->getLineChartColor(); ?>"
                }],
            
        },
        "graph_goldenlist_cv" : {
            "keyName" : "graph_goldenlist_cv",
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
            "dataProvider" : [ {
                "item": "平日午前",
                "number": <?= $goldenlistGoldenList->call_program_expected_cv_number_wd_am ?>,
                "rate": <?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_expected_cv_rate_reached_wd_am) ?>,
                "color": "<?= $this->ReportGraph->getLineChartColor(); ?>"
            }, {
                "item": "平日午後",
                "number": <?= $goldenlistGoldenList->call_program_expected_cv_number_wd_pm ?>,
                "rate": <?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_expected_cv_rate_reached_wd_pm) ?>,
                "color": "<?= $this->ReportGraph->getLineChartColor(); ?>"
            }, {
                "item": "平日夜間",
                "number": <?= $goldenlistGoldenList->call_program_expected_cv_number_wd_night ?>,
                "rate": <?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_expected_cv_rate_reached_wd_night) ?>,
                "color": "<?= $this->ReportGraph->getLineChartColor(); ?>"
            }, {
                "item": "休日午前",
                "number": <?= $goldenlistGoldenList->call_program_expected_cv_number_hd_am ?>,
                "rate": <?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_expected_cv_rate_reached_hd_am) ?>,
                "color": "<?= $this->ReportGraph->getLineChartColor(); ?>"
            }, {
                "item": "休日午後",
                "number": <?= $goldenlistGoldenList->call_program_expected_cv_number_hd_pm ?>,
                "rate": <?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_expected_cv_rate_reached_hd_pm) ?>,
                "color": "<?= $this->ReportGraph->getLineChartColor(); ?>"
            }, {
                "item": "休日夜間",
                "number": <?= $goldenlistGoldenList->call_program_expected_cv_number_hd_night ?>,
                "rate": <?= $this->ReportGraph->getRate($goldenlistGoldenList->call_program_expected_cv_rate_reached_hd_night) ?>,
                "color": "<?= $this->ReportGraph->getLineChartColor(); ?>"
            }],
        }
    };
    renderColumnChart(chartInfo.graph_goldenlist_expected, true);
    renderColumnChart(chartInfo.graph_goldenlist_sufficient, true);
    renderColumnChart(chartInfo.graph_goldenlist_list_num, true);
    renderMixChart(chartInfo.graph_goldenlist_reached, true);
    renderMixChart(chartInfo.graph_goldenlist_cv, true);
</script>
 <?php $this->end(); ?>