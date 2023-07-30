<?= $this->extend('layouts/bs5') ?>

<?= $this->section('content') ?>
<div class="container">
    <!-- validation errors -->
    <?= validation_list_errors() ?>
    <!-- validation errors end -->

    <?= view("partialview/flashdata") ?>
    <?= form_open("registration") ?>
    <h2 class="text-primary">Register</h2>

    <div class="form-group">
        <label class="form-label" for="">Name</label>
        <input name="name" class="form-control" type="text" required value="<?= set_value('name') ?>">
    </div>

    <div class="form-group">
        <label class="form-label" for="">Email</label>
        <input name="email" required class="form-control" type="email" value="<?= set_value('email') ?>">
    </div>

    <div class="form-group">
        <label class="form-label" for="">Password</label>
        <input name="password" class="form-control" type="password" required>
    </div>
    <div class="form-group">
        <label class="form-label" for="">Retype Password</label>
        <input name="password2" class="form-control" type="password" required>
    </div>

    <button class="btn btn-primary mt-3">Register</button>

    <?= form_close() ?>
</div>

<?= $this->endSection() ?>