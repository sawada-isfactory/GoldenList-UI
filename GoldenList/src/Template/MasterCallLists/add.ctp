<?php
/**
 * @var \App\View\AppView $this
 */
?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">コールリスト新規作成</h1>
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
<div class="row">
    <div class="col-lg-6">
            <?= $this->Form->create($masterCallList, ['role' => 'form', 'enctype' => 'multipart/form-data']) ?>
            <div class="form-group">
                <label>コールリスト名</label>
                <input class="form-control" name=call_list_name value="<?= $masterCallList->call_list_name ?>">
                <p class="text-danger"><?= $this->Utility->getErrorStr('call_list_name',$masterCallList->errors()); ?></p>
            </div>

            <?= $this->Element('FormParts/MasterCallLists/StepForm') ?>

            <?= $this->Form->end() ?>
    </div>
    <!-- /.col-lg-6 -->
</div>
<!-- /.row -->
<?php $this->start('appendScript'); ?>
<script>
<?php if (empty($masterCallList->cap_enable )): ?>
    $('.operator-input').prop('disabled', true);
<?php endif ?>
</script>
<?php $this->end();?>