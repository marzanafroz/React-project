<?= $this->extend('layouts/bs5') ?>

<?= $this->section('content') ?>
<h1><?= WRITEPATH ?></h1>
<h1>Total Products: <?= $total ?></h1>
<?= $pager->links() ?>
<?php 
foreach ($products as $row) {
    echo "<div><a href='".base_url('details/'.$row['id'])."'><h3>{$row['name']}</h3>";
    echo "<img src='".base_url()."/storage/".$row['images']."' class='img-fluid'/>";
    echo "{$row['description']}</a><hr></div>";
}
?>
<!--  -->
<!--  -->
<?= $pager->links() ?>
<?= $this->endSection() ?>

<?= $this->section('myscript') ?>
<h1>DB query time: <?php //echo $querytime ; ?></h1>
<?= $this->endSection() ?>

