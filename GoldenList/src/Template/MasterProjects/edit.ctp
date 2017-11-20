<!-- ページタイトル -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <p class="edit_txt" id="project_name"><?= $masterProject->project_name ?></p>
            <a href="javascript:void(0)" id="edit_button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <a href="javascript:void(0)" class="pull-right" data-toggle="modal" data-target="#deleteModal" data-whatever="<?= $masterProject->id ?>" data-title="<?= $masterProject->project_name ?>"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="row">
            <div class="col-lg-12">
                <h4>データ充実度</h4>
                <p style="margin-bottom:-10px">分析に使用したデータ項目数を表示しています。</p>
                <div id="accuracyGraph2" style="width: 100%; height: 100px;"></div>

                <h4>開始時刻設定</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th>午前開始時刻</th>
                        <th>午後開始時刻</th>
                        <th>夜間開始時刻</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <td><?= $masterProject->start_time_am->format('H:i:s') ?></td>
                    <td><?= $masterProject->start_time_pm->format('H:i:s') ?></td>
                    <td><?= $masterProject->start_time_night->format('H:i:s') ?></td>
                    </tr>
                    </tbody>
                </table>
                <h4>ゴールデンリスト</h4>
                <table class="table">
                <?php if (!empty($masterProject->master_call_lists)):?>
                    <thead>
                    <tr>
                        <th>ゴールデンリスト名</th>
                        <th>進行状況</th>
                        <th colspan="2">設定</th>
                    </tr>
                    </thead>
                <?php endif;?>
                    <tbody>
                    <?php if (!empty($masterProject->master_call_lists)):?>
                        <?php foreach($masterProject->master_call_lists as $item):?>
                            <tr class="callListItem<?= $item->id ?>">
                                <td> <?= $item->call_list_name ?></td>
                                <td>
                                    <ul class="side_list-group vertical-steps">
                                        <?php //complete 終了: active 進行中 : none みかん// ?>
                                        <li class="<?= $this->Utility->getEngineStatusStep($item->goldenlist_status_engine, 1); ?>">1</li>
                                        <li class="<?= $this->Utility->getEngineStatusStep($item->goldenlist_status_engine, 2); ?>">2</li>
                                        <li class="<?= $this->Utility->getEngineStatusStep($item->goldenlist_status_engine, 3); ?>">3</li>
                                        <li class="<?= $this->Utility->getEngineStatusStep($item->goldenlist_status_engine, 4); ?>">4</li>
                                    </ul>
                                </td>
                                <td class="text-center">
                                    <a href="<?= $this->Url->build(['controller' => 'MasterCallLists', 'action' => 'edit', $masterProject->id, $item->id]); ?>"><i class="fa fa-cog fa-2x" aria-hidden="true"></i></a>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#callListDeleteModal" data-whatever="<?= $item->id ?>" data-title="<?= $item->call_list_name ?>" ><i class="fa fa-trash text-danger fa-2x" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    <?php endif;?>
                    <tr>
                        <td colspan="4"><a href="<?= $this->Url->build(['controller' => 'MasterCallLists', 'action' => 'add', $masterProject->id]); ?>"><i class="fa fa-plus fa-fw"></i> コールリスト新規作成</a></td>
                    </tr>
                    </tbody>

                </table>
            </div>
            <!-- /.col-lg-12-->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.col-lg-6-->
</div>
<!-- /.row -->

<!-- Project Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="projectDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="projectDeleteModalLabel">プロジェクト削除</h4>
            </div>
            <div class="modal-body">
                <form id="deleteForm" method="post" action="delete">
                    <p class="modal-body-p">プロジェクトを削除してもよろしいですか。</p>
                    <div class="form-group text-center">
                        <input id="deleteProjectId" type="hidden" name="id">
                        <input id="deleteProject" class="btn btn-danger" type="button" value="削除">
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Project Delete Modal -->


<!-- Calllist Delete Modal -->
<div class="modal fade" id="callListDeleteModal" tabindex="-1" role="dialog" aria-labelledby="callListDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="callListDeleteModalLabel">コールリスト削除</h4>
            </div>
            <div class="modal-body">
                <form id="deleteCallListForm" method="post" action="delete">
                    <p class="modal-body-p">コールリストを削除してもよろしいですか。</p>
                    <div class="form-group text-center">
                        <input id="deleteCallListId" type="hidden" name="id">
                        <input id="deleteCallList" class="btn btn-danger" type="button" value="削除">
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Calllist Delete Modal -->
<?php $this->start('appendScript'); ?>
<script>
    var reqInfo = setRequest(<?= json_encode($this->Utility->getUpdateUrls())?>, 'project_name');
    renderAccuracyGraph(<?= $this->ReportGraph->getGraphCounts($masterProject->goldenlist_loyal_customer)?>,<?= $graphCount ?>);
</script>
<?php $this->end(); ?>
