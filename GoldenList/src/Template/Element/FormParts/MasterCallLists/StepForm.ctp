<?php
/**
 * ステップフォーム
 */
?>
<ol class="list-group vertical-steps">
    <li class="list-group-item step1 <?= $this->Utility->getEngineStatusStep($masterCallList->goldenlist_status_engine, 1); ?>"><span>
                    <div class="form-group">
                    <h4>リストアップロード</h4>
                        <p id = "uploadFileName"><?= empty($masterCallList->goldenlist_status_engine)? "" : $masterCallList->goldenlist_status_engine->upload_file_name ?></p>
                        <input type="file" name="file">
                    </div>
            <?php if ($this->request->action == 'edit') :?>

                    <div class="form-group">
                        <button id="uploadStep1" type="button" class="btn btn-primary btn-sm">アップロード</button>
                    </div>
            <?php endif;?>
                    </span></li>
    <li class="list-group-item step2 <?= $this->Utility->getEngineStatusStep($masterCallList->goldenlist_status_engine, 2); ?>"><span>
                    <h4>目標値設定</h4>
                    <label>購入</label>
                    <div class="form-group input-group">
                    <input class="form-control purchase-input" name="cv_target_number" value="<?= $masterCallList->cv_target_number ?>">
                        <span class="input-group-addon">件</span>
                    </div>
                    <p id="cv_target_number" class="text-danger"><?= $this->Utility->getErrorStr('cv_target_number',$masterCallList->errors()); ?></p>

                    <h4>コールプログラム</h4>
                        <div class="form-group input-group limit">
                            <input name="cap_enable" type="checkbox" class="checkbox-inline" id="limit" <?= empty($masterCallList->cap_enable )? "" : "checked"?> value="1"> コールプログラム配分の上限を設定する
                        </div>
                        <h5>平日</h5>
                        <div class="row">
                            <div class="col-lg-4">
                                <label>午前</label>
                                <div class="form-group input-group">
                                <input class="form-control operator-input" name="cap_wd_am" value="<?= $masterCallList->cap_wd_am ?>">
                                <span class="input-group-addon">件</span>
                                </div>
                                <p id="cap_wd_am" class="text-danger"><?= $this->Utility->getErrorStr('cap_wd_am',$masterCallList->errors()); ?></p>

                             </div>
                            <div class="col-lg-4">
                                <label>午後</label>
                                <div class="form-group input-group">
                                    <input class="form-control operator-input" name="cap_wd_pm" value="<?= $masterCallList->cap_wd_am ?>">
                                    <span class="input-group-addon">件</span>
                                </div>
                               <p id="cap_wd_pm" class="text-danger"><?= $this->Utility->getErrorStr('cap_wd_pm',$masterCallList->errors()); ?></p>

                            </div>
                            <div class="col-lg-4">
                                <label>夜間</label>
                                <div class="form-group input-group">
                                    <input class="form-control operator-input" name="cap_wd_night" value="<?= $masterCallList->cap_wd_night ?>">
                                    <span class="input-group-addon">件</span>
                                </div>
                                <p id="cap_wd_night" class="text-danger"><?= $this->Utility->getErrorStr('cap_wd_night',$masterCallList->errors()); ?></p>
                            </div>
                        </div>
                        <h5>休日</h5>
                        <div class="row">
                           <div class="col-lg-4">
                                <label>午前</label>
                                <div class="form-group input-group">
                                  <input class="form-control operator-input" name="cap_hd_am" value="<?= $masterCallList->cap_hd_am ?>">
                                  <span class="input-group-addon">件</span>
                                </div>
                                 <p id="cap_hd_am" class="text-danger"><?= $this->Utility->getErrorStr('cap_hd_am',$masterCallList->errors()); ?></p>

                            </div>
                           <div class="col-lg-4">
                                <label>午後</label>
                                <div class="form-group input-group">
                                  <input class="form-control operator-input" name="cap_hd_pm" value="<?= $masterCallList->cap_hd_pm ?>">
                                  <span class="input-group-addon">件</span>
                                </div>
                                <p id="cap_hd_pm" class="text-danger"><?= $this->Utility->getErrorStr('cap_hd_pm',$masterCallList->errors()); ?></p>

                            </div>
                           <div class="col-lg-4">
                                <label>夜間</label>
                                <div class="form-group input-group">
                                  <input class="form-control operator-input" name="cap_hd_night" value="<?= $masterCallList->cap_hd_night ?>">
                                  <span class="input-group-addon">件</span>
                                </div>
                                <p id="cap_hd_night" class="text-danger"><?= $this->Utility->getErrorStr('cap_hd_night',$masterCallList->errors()); ?></p>

                           </div>
                     </div>
                    </span>
        <?php if ($this->request->action == 'add'):?>
        <button type="submit" class="btn btn-primary btn-sm">コールプログラムを作成する</button>
        <?php elseif ($this->request->action == 'edit'): ?>
        <button id="updateCaps" type="button" class="btn btn-primary btn-sm">コールプログラムを作成する</button>
        <?php endif;?>
    </li>
    <?php if ($this->request->action == 'edit'): ?>
    <li class="list-group-item step3 <?= $this->Utility->getEngineStatusStep($masterCallList->goldenlist_status_engine, 3); ?>"><span>
    <div class="form-group">
      <h4>ゴールデンリスト（コール用リスト）ダウンロード</h4>
        <a href="<?= $this->Utility->getContentUrl($this->request->controller, 'download', $this->request->pass);?>" class="btn btn-primary btn-sm reportDl">ダウンロード</a>
    </div>
  </span></li>

    <li class="list-group-item step4 <?= $this->Utility->getEngineStatusStep($masterCallList->goldenlist_status_engine, 4); ?>"><span>
    <div class="form-group">
      <h4>コール結果アップロード</h4>
      <p></p>
      <input type="file" name="fileStep4">
    </div>
    <div class="form-group">
        <button id="uploadStep4" type="button" class="btn btn-primary btn-sm">アップロード</button>
    </div>
  </span>
    </li>
    <?php endif;?>
</ol>