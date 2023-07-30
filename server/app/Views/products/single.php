<?= $this->extend('layouts/bs5') ?>

<?= $this->section('content') ?>
<h3><?= $info['name']; ?></h3>
<p><?= $info['description']?></p>
<?= $this->endSection() ?>

<?= $this->section('myscript') ?>

<?= $this->endSection() ?>

