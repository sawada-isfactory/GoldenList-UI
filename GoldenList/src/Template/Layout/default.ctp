<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>COLLABOS Golden List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap Core CSS -->
    <?= $this->Html->css('GoldenList.bootstrap/bootstrap.min') ?>

    <!-- MetisMenu CSS -->
    <?= $this->Html->css('GoldenList.metisMenu/metisMenu.min') ?>

    <!-- Custom CSS -->
    <?= $this->Html->css('GoldenList.sb-admin-2/sb-admin-2') ?>

    <?= $this->Html->css('GoldenList.mystyle') ?>

</head>
<body>
<div id="wrapper">
    <?= $this->cell("GoldenList.Sidebar"); ?>
    <div id="page-wrapper" class="col-md-10">
        <?= $this->fetch('content') ?>
    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<!-- export Modal -->
<?= $this->cell("GoldenList.Sidebar")->render('modal'); ?>
<!-- /export Modal -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<?= $this->Html->script('GoldenList.js.cookie') ?>
<?= $this->Html->script('GoldenList.bootstrap/bootstrap.min') ?>


<!-- Metis Menu Plugin JavaScript -->
<?= $this->Html->script('GoldenList.metisMenu/metisMenu.min') ?>

<?= $this->Html->script('GoldenList.amcharts/amcharts') ?>
<?= $this->Html->script('GoldenList.amcharts/serial') ?>
<?= $this->Html->script('GoldenList.amcharts/pie') ?>
<?= $this->Html->script('GoldenList.amcharts/radar') ?>
<?= $this->Html->script('GoldenList.amcharts/xy') ?>

<!-- Custom Theme JavaScript -->
<?= $this->Html->script('GoldenList.sb-admin-2/sb-admin-2');?>
<?= $this->Html->script('GoldenList.myjs');?>
<?= $this->Html->script('GoldenList.mygraph');?>
<?= $this->fetch('appendScript'); ?>
</body>
</html>
<?php


