<?php
/**
 * @var \App\View\AppView $this
 */
?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <p class="edit_txt" id="project_name"><?= $masterCallList->call_list_name ?></p>
            <a href="javascript:void(0)" id="edit_button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <a href="javascript:void(0)" class="pull-right" data-toggle="modal" data-title="<?= $masterCallList->call_list_name ?>" data-target="#deleteModal"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- alert -->
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-info" id="success1" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            正常に作成できました
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<?= $this->Form->create($masterCallList, ['role' => 'form']) ?>
<div class="row">
    <div class="col-lg-6">
        <form role="form">
            <?= $this->Element('FormParts/MasterCallLists/StepForm') ?>
            <?= $this->Form->end() ?>
    </div>
    <!-- /.col-lg-6 -->
</div>
<!-- /.row -->

<!-- Calllist Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="callListDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="callListDeleteModalLabel">コールリスト削除</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    <form id="deleteForm" method="post" action="delete">
                        <p class="modal-body-p">コールリストを削除してもよろしいですか。</p>
                        <div class="form-group text-center">
                            <input id="deleteForm" class="btn btn-danger" type="button" value="削除">
                        </div>
                    </form>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Calllist Delete Modal -->

<!-- Calllist Update Modal -->
<div class="modal fade" id="callListUpdateModal" tabindex="-1" role="dialog" aria-labelledby="callListUpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="callListUpdateModalLabel">コールリストアップデート</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    <p>すでに登録されているコールリストをアップデートしてもよろしいですか。</p>
                    <div class="form-group text-center">
                        <input class="btn btn-primary" type="button" value="アップロード">
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Calllist Update Modal -->
<div class="goldenModal">
        <h2><img src="/golden_list/image/icon_loding.gif"></h2>
</div>
<?php $this->start('appendScript'); ?>
    <script>
        var reqInfo = setRequest(<?= json_encode($this->Utility->getUpdateUrls(['uploadStep1','uploadStep4','updateCaps']))?>, 'call_list_name');
        setCheckStatusUrl("<?= $this->Url->build(['action' => 'checkStatus', $this->request->params['pass'][0], $this->request->params['pass'][1]]); ?>");
    </script>
<?php $this->end(); ?>