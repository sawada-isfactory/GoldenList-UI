<?php use Cake\Utility\Hash;?>
<?php foreach ($sidebar as $project): ?>
    <div class="modal fade in" id="exportModalProj<?= $project->master_project_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">ダウンロード</h4>
                </div>
                <div class="modal-body">
                        <div class="panel panel-default">
                            <div class="panel-heading">レポートダウンロード</div>
                            <!-- /.panel-heading -->

                            <div class="panel-body">

                                <div class="form-inline">
                                    <a href="<?= $this->Utility->getContentUrl('MasterProjects', 'download', [$project->master_project_id]);?>" class="btn btn-primary btn-sm reportDl">ダウンロード</a>
                                </div>

                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel .panel-default -->

                        <div class="panel panel-default">
                            <div class="panel-heading">ゴールデンリスト</div>
                            <!-- /.panel-heading -->

                            <div class="panel-body" id="calllist">
                                <form method="get" action="<?= $this->Utility->getContentUrl('MasterProjects', 'downloadGoldenLists', [$project->master_project_id]);?>">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label class="checkbox"><input type="checkbox" id="chkAllGoldenListCsv"> 全てのゴールデンリスト</label>
                                    </div>
                                    <div id="chkGoldenListCsvs">
                                    <?php foreach ($project->goldenlist_sidebar_call_lists as $callList): ?>
                                        <div class="checkbox">
                                            <label class="checkbox"><input type="checkbox" name="master_call_list_ids[]" class="chkGoldenListCsv" value="<?= $callList->master_call_list_id ?>"> <?= $callList->call_list_name ?></label>
                                        </div>
                                    <?php endforeach;?>
                                    </div>
                                </div>
                                <div class="form-group text-left">
                                    <button type="submit" class="btn btn-primary callListDlForm">ダウンロード</button>
                                </div>
                                </form>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel .panel-default -->
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>
<div class="modal fade in" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close errClose" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">エラー</h4>
            </div>
            <div class="modal-body">
                <p id = "modalErrMsg" class="modal-body-p"></p>
            </div>
        </div>
    </div>
</div>