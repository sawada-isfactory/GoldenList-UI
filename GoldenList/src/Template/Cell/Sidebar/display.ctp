<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= $this->Utility->getContentUrl('MasterProjects', 'index') ?>">COLLABOS Goleden List <span>powered by bodais</span> <?= !empty($isDemo)? "[デモ]" : ""?></a>
    </div>
    <!-- /.navbar-header -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="active">
                    <a href="#"><i class="fa fa-list-ul fa-fw"></i> プロジェクト<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <?php foreach($sidebar as $project):
                            $prjActive = $this->Utility->getSidebarActive($active, 'MasterProjects', 'edit', [$project->master_project_id]);
                            $loyalActive = $this->Utility->getSidebarActive($active, 'GoldenlistLoyalCustomers', 'view', [$project->master_project_id]);
                            $overViewActive = $this->Utility->getSidebarActive($active, 'GoldenlistProjectOverviews', 'view', [$project->master_project_id]);
                            $callListTopActive = $this->Utility->getSidebarActive($parentActive, 'GoldenlistGoldenLists', 'view', [$project->master_project_id]);
                            $callListEditActicve = $this->Utility->getSidebarActive($parentActive, 'MasterCallLists', 'edit', [$project->master_project_id]);
                            $callListAddActive = $this->Utility->getSidebarActive($parentActive, 'MasterCallLists', 'add', [$project->master_project_id]);
                            $callListActive = '';
                            $prjActive = ($prjActive || $callListEditActicve || $callListAddActive)? 'active' : '';
                            $topActive = ($prjActive || $loyalActive || $overViewActive || $callListTopActive)? 'active' : '';
                            ?>
                        <li class="<?= $topActive ?>">
                            <a href="javascript:void(0)"><?= $project->project_name ?><span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li class="icon <?= $prjActive ?>">
                                    <a class="icon <?= $prjActive ?>" href="<?= $this->Utility->getContentUrl('MasterProjects', 'edit', [$project->master_project_id])?>"><i class="fa fa-cog fa-3" aria-hidden="true"></i></a>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#exportModalProj<?= $project->master_project_id ?>"><i class="fa fa-download fa-3" aria-hidden="true"></i></a>
                                </li>
                                <li class="<?= $callListTopActive ?>">
                                    <a href="javascript:void(0)">予測結果 <span class="fa arrow"></span></a>
                                    <?php foreach ($project->goldenlist_sidebar_call_lists as $callList):
                                        $callListActive = $this->Utility->getSidebarActive($active, 'GoldenlistGoldenLists', 'view', [$project->master_project_id, $callList->master_call_list_id]);
                                    ?>

                                    <ul class="nav nav-fourth-level">
                                        <li><a class="<?= $callListActive ?>" href="<?= $this->Utility->getContentUrl('GoldenlistGoldenLists', 'view', [$project->master_project_id, $callList->master_call_list_id]) ?>"><?= $callList->call_list_name ?></a></li>
                                    </ul>
                                    <!-- /.nav-fourth-level -->
                                    <?php endforeach; ?>
                                </li>
                                <li><a class="<?= $loyalActive ?>" href="<?= $this->Utility->getContentUrl('GoldenlistLoyalCustomers', 'view', [$project->master_project_id])?>">優良顧客分析</a></li>
                                <li><a class="<?= $overViewActive ?>" href="<?= $this->Utility->getContentUrl('GoldenlistProjectOverviews', 'view', [$project->master_project_id])?>">プロジェクト概況</a></li>
                            </ul>
                            <!-- /.nav-third-level -->
                        </li>
                        <?php endforeach;?>
                        <li>
                            <a href="<?= $this->Utility->getContentUrl('MasterProjects', 'add')?>"><i class="fa fa-plus fa-fw"></i> プロジェクト新規作成</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li class="active">
                    <a href="#"><i class="fa fa-link fa-fw"></i> 関連サービス<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="/">bodais</a></li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-default -->
</nav>
<!-- /.navbar .navbar-default .navbar-static-top -->
