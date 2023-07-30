<?= $this->extend('layouts/bs5') ?>

<?= $this->section('content') ?>
<h1>Add Product</h1>
<h1><?//= WRITEPATH ?></h1>
<p>enable csrf in config/filter.php in before key in globals array and create form_open() to add csrf field automatically. but to enable form helper add <q> protected $helpers = ['form'];</q> in your controller</p>
<?= validation_list_errors() ?>
        <!-- <form action="<?= base_url('product/save') ?>" method="post" enctype="multipart/form-data"> -->
        <!-- CSRF Field -->
        <?//= csrf_field() ?> 
        <!-- <?//= form_open('products/new') ?> -->
        <?= form_open_multipart('products/new') ?>
        
       
        <div class="mb-3">
                <label for="category_id" class="form-label">Category ID</label>
                <input type="text" class="form-control"
                value="<?= set_value('category_id') ?>"
                id="category_id" name="category_id">
            </div>

            <div class="mb-3">
                <label for="subcategory_id" class="form-label">Subcategory ID</label>
                <input type="text" class="form-control"
                value="<?= set_value('subcategory_id') ?>" id="subcategory_id" name="subcategory_id">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">
                <?= set_value('description') ?>
                </textarea>
            </div>

            <div class="mb-3">
                <label for="sku" class="form-label">SKU</label>
                <input type="text" class="form-control" id="sku" name="sku" value="<?= set_value('sku') ?>">
            </div>

            <div class="mb-3">
                <label for="images" class="form-label">Images</label>
                <input type="file" class="form-control" id="images" name="images">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="<?= set_value('price') ?>">
            </div>

            <div class="mb-3">
                <label for="newprice" class="form-label">New Price</label>
                <input type="text" class="form-control" id="newprice" name="newprice" value="<?= set_value('newprice') ?>">
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="text" class="form-control" id="quantity" name="quantity" value="<?= set_value('quantity') ?>">
            </div>

            <div class="mb-3">
                <label for="discount" class="form-label">Discount</label>
                <input type="text" class="form-control" id="discount" name="discount" value="<?= set_value('discount') ?>">
            </div>

            <div class="mb-3">
                <label for="hot" class="form-label">Hot</label>
                <input type="checkbox" class="form-check-input" id="hot" name="hot" value="<?= set_value('hot') ?>">
            </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
        <!-- </form> -->
        <?= form_close() ?>
<?= $this->endSection() ?>

<?= $this->section('myscript') ?>

<?= $this->endSection() ?>