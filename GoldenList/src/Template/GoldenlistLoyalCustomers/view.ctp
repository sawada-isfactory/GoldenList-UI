<!-- ページタイトル -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= $goldenlistLoyalCustomer->project_name?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>





    <!---------------------------------------------------------------->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">要因分析</div>
                <!-- /.panel-heading -->

                <div class="panel-body">

                    <div class="row">
                        <div class="col-lg-12">

                            <div class="panel-group" id="accordion11">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion11" href="#collapseOne11">強い影響がある項目</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne11" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <h4><i class="fa fa-thumbs-o-up" aria-hidden="true" style="color: #337ab7;"></i> POSITIVE</h4>
                                                    <ul>
                                                        <?php if(!empty($indicator->impact_by->strong->positive)):?>
                                                        <?php foreach($indicator->impact_by->strong->positive as $item):?>
                                                            <li><?= $item->classification_name?>が<?= $item->category->str?><?= $item->category->unit?>だとスコアが上がります</li>
                                                        <?php endforeach;?>
                                                        <?php endif;?>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6">
                                                    <h4><i class="fa fa-thumbs-o-down" aria-hidden="true" style="color: #d9534f;"></i> NEGATIVE</h4>
                                                    <ul>
                                                        <?php if(!empty($indicator->impact_by->strong->negative)):?>
                                                        <?php foreach($indicator->impact_by->strong->negative as $item):?>
                                                            <li><?= $item->classification_name?>が<?= $item->category->str?><?= $item->category->unit?>だとスコアが下がります</li>
                                                        <?php endforeach;?>
                                                        <?php endif;?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-lg-12 (nested) -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-group" id="accordion12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion12" href="#collapseTwo12">影響がある項目</a>
                                        </h4>
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div id="collapseTwo12" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <h4><i class="fa fa-thumbs-o-up" aria-hidden="true" style="color: #337ab7;"></i> POSITIVE</h4>
                                                    <ul>
                                                        <?php if(!empty($indicator->impact_by->medium->positive)):?>
                                                        <?php foreach($indicator->impact_by->medium->positive as $item):?>
                                                            <li><?= $item->classification_name?>が<?= $item->category->str?><?= $item->category->unit?>だとスコアが上がります</li>
                                                        <?php endforeach;?>
                                                        <?php endif;?>

                                                    </ul>
                                                </div>
                                                <div class="col-lg-6">
                                                    <h4><i class="fa fa-thumbs-o-down" aria-hidden="true" style="color: #d9534f;"></i> NEGATIVE</h4>
                                                    <ul>
                                                        <?php if(!empty($indicator->impact_by->medium->negative)):?>
                                                        <?php foreach($indicator->impact_by->medium->negative as $item):?>
                                                            <li><?= $item->classification_name?>が<?= $item->category->str?><?= $item->category->unit?>だとスコアが下がります</li>
                                                        <?php endforeach;?>
                                                        <?php endif;?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.panel-body -->
                                    </div>
                                    <!-- /.panel-collapse -->
                                </div>
                                <!-- /.panel -->
                            </div>
                            <!-- /.panel-group -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-group" id="accordion13">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion13" href="#collapseThree13">影響が小さい項目</a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree13" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="col-lg-6">
                                                <h4><i class="fa fa-thumbs-o-up" aria-hidden="true" style="color: #337ab7;"></i> POSITIVE</h4>
                                                <ul>
                                                    <?php if(!empty($indicator->impact_by->thin->positive)):?>
                                                    <?php foreach($indicator->impact_by->thin->positive as $item):?>
                                                        <li><?= $item->classification_name?>が<?= $item->category->str?><?= $item->category->unit?>だとスコアが上がります</li>
                                                    <?php endforeach;?>
                                                    <?php endif;?>
                                                </ul>
                                            </div>
                                            <!-- /.col-lg-6 -->
                                            <div class="col-lg-6">
                                                <h4><i class="fa fa-thumbs-o-down" aria-hidden="true" style="color: #d9534f;"></i> NEGATIVE</h4>
                                                <ul>
                                                    <?php if(!empty($indicator->impact_by->thin->negative)):?>
                                                    <?php foreach($indicator->impact_by->thin->negative as $item):?>
                                                        <li><?= $item->classification_name?>が<?= $item->category->str?><?= $item->category->unit?>だとスコアが下がります</li>
                                                    <?php endforeach;?>
                                                    <?php endif;?>
                                                </ul>

                                            </div>
                                            <!-- /.col-lg-6 -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-lg-12 -->
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

    <div id="Affix3">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default" id="accordion31">

                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion31" href="#collapse31">表示グラフ</a>
                        </h4>
                    </div>
                    <div id="collapse31" class="panel-collapse collapse in">

                        <div class="panel-body">


                            <div id="analysisDisplay">
                                <?php
                                $activeCnt = 0;
                                $activeGraphId = 0;
                                foreach($graphs as $group):
                                ?>
                                <h4 style="font-size: 1.6rem"><?= $group['name'] ?></h4>
                                <div class="col-lg-12" style="margin-bottom: 10px;">

                                    <?php

                                    foreach ($group['graphs'] as $graph):

                                        if (empty($graph['graph'])){
                                            $active = "disabled";
                                        } else {
                                            if ($activeCnt == 0) {
                                                $active = "active";
                                                $activeGraphId  = $graph['id'];
                                                $activeCnt = 1;
                                            } else {
                                                $active = "";
                                            }
                                        }

                                     ?>
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-xs btn-default <?= $active ?>">
                                                <input class='graphBtn graphBtn-<?= $graph['id']?>' type="checkbox" name="result[]" value="graphBtn-<?= $graph['id'] ?>" <?= ($active == 'active')? "checked" : ""?> autocomplete="off"><span><?= $graph['name'] ?></span>
                                            </label>
                                        </div>
                                    <?php endforeach;?>
                                </div>
                                <?php endforeach;?>
                                <!-- /.col-lg-12 -->
                            </div>
                            <!-- /#analysisDisplay -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel-collapse -->
                </div>
                <!-- /.panel .panel-default -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->



        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body" id="graphDisplayLabel">
                        <?php foreach($this->ReportGraph->flattenGraph($graphs) as $graph):?>
                            <span class="label label-primary" id="graphBtn-<?= $graph['id'] ?>"><?= $graph['name'] ?></span>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>


    <div id="sortable">
        <?php foreach($this->ReportGraph->flattenGraph($graphs) as $graph):?>
        <div class="row" id="graph<?= $graph['id'] ?>" style="display:none">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><?= $graph['name'] ?>分析</div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="text-center"><?= $graph['name'] ?>の分布</h3>
                                <div class="graph_size" id="serialChart<?= $graph['id'] ?>"></div>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                            <div class="col-lg-6">
                                <h3 class="text-center">優良顧客の特徴</h3>
                                <div class="graph_size" id="pieChart<?= $graph['id'] ?>"></div>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.panel-default-->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <?php endforeach;?>
    </div>
    <!-- /#sortable -->



<?php $this->start('appendScript'); ?>
<script>
    <?php $chartData = $this->ReportGraph->getChartData($graphs);?>
    var chartInfo = <?= json_encode($chartData) ?>;
    $(function(){
        $('.graphBtn').change(function () {
            var key = $(this).val().split("-");
            console.log(key[1]);
            if ($(this).is(':checked')) {
                renderLoyalCustomerChart(chartInfo, key[1]);
                $('#graph' + key[1]).css({'display': 'block'});
                $('#' + $(this).val()).css({'display': 'inline'});
            } else {
                $('#graph' + key[1]).css({'display': 'none'});
                $('#' + $(this).val()).css({'display': 'none'});
            }
        });
        renderLoyalCustomerChart(chartInfo, <?= $activeGraphId ?>);
        $('#graph<?= $activeGraphId ?>').css({'display': 'block'});
    });
    $('#graphBtn-<?= $activeGraphId ?>').css({'display': 'inline'});
</script>
<?php $this->end(); ?>
