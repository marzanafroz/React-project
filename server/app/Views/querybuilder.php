<?= $this->extend('layouts/bs5') ?>
<?= $this->section('content') ?>
<h3>Query builder </h3>
<nav>
    <br><?= anchor("db/categories","All categories"); ?> | 
    <br><?= anchor("db/getwhere","Where in query builder"); ?> |
    <br><?= anchor("db/addcategory","Insert in query builder"); ?> | 
    <br><?= anchor("db/upsert","Upsert: update or insert"); ?> | 
    <br><?= anchor("db/update","Update in query builder"); ?> | 
    <br><?= anchor("db/api","one api returns more than one table info"); ?> | 
    <br><?= anchor("db/chaining","Method Chaining"); ?> | 
</nav>
<?= $this->endSection() ?>



