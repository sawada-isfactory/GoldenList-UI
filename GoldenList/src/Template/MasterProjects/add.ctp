<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">新しいプロジェクト作成</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<?= $this->Element('alert') ?>
<div class="row">
    <div class="col-lg-6">
        <?= $this->Form->create($masterProject, ['role' => 'form']) ?>
        <div class="form-group">
            <label>プロジェクト名</label>
            <input class="form-control" name='project_name' value="<?= $masterProject->project_name ?>">
            <p class="text-danger"><?= $this->Utility->getErrorStr('project_name',$masterProject->errors()); ?></p>
        </div>
        <div class="form-group">
            <label>午前開始時刻設定</label>
            <?=
            $this->Form->select(
                'start_time_am',
                $this->Utility->getHourList(),
                ['class' => ['form-control'], 'disabled' => !empty($disabled)]
            )
            ?>
            <p class="text-danger"><?= $this->Utility->getErrorStr('start_time_am',$masterProject->errors()); ?></p>
        </div>
        <div class="form-group">
            <label>午後開始時刻設定</label>
            <?=
            $this->Form->select(
                'start_time_pm',
                $this->Utility->getHourList(),
                ['class' => ['form-control'], 'disabled' => !empty($disabled)]
            )
            ?>
            <p class="text-danger"><?= $this->Utility->getErrorStr('start_time_pm',$masterProject->errors()); ?></p>
        </div>
        <div class="form-group">
            <label>夜間開始時刻設定</label>
            <?=
            $this->Form->select(
                'start_time_night',
                $this->Utility->getHourList(),
                ['class' => ['form-control'], 'disabled' => !empty($disabled)]
            )
            ?>
            <p class="text-danger"><?= $this->Utility->getErrorStr('start_time_night',$masterProject->errors()); ?></p>
        </div>

        <?php
        $this->Form->hidden('customize-flag', ['value' => 0]);
        /**
        <div class="form-group">
            <label>カスタマイズ設定</label>
            <label class="radio-inline">
                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1">あり
            </label>
            <label class="radio-inline">
                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">なし
            </label>
        </div>
         */ ?>
        <?= $this->Element('FormParts/ButtonCreate') ?>
        <?= $this->Form->end() ?>
    </div>
    <!-- /.col-lg-6 -->
</div>
<!-- /.row -->