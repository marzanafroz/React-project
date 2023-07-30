<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <?= $this->renderSection('headsection') ?>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
<!--         <li class="nav-item">
          <a class="nav-link" href="<?= base_url("products")?>">Products</a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url("products")?>">All</a></li>
            <li><a class="dropdown-item" href="<?= base_url("products/new")?>">New</a></li>
            <li><a class="dropdown-item" href="<?= base_url("api/products")?>">API</a></li>
            <li><a class="dropdown-item" href="<?= base_url("/api/testproducts/5/info")?>">2 dynamic params</a></li>

          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            pages
          </a>
          <ul class="dropdown-menu">
            <li>
              <!-- <a class="dropdown-item" href="<?= base_url("test1")?>">test1 bottleneck</a> -->
              <?= anchor("test1","test1 bottleneck",['title'=>"test1 bottleneck",'class'=>"dropdown-item"]) ?>
            </li>
            <li><a class="dropdown-item" href="<?= base_url("test2")?>">test2 bottleneck</a></li>
            <li><a class="dropdown-item" href="<?= base_url("static/fruits")?>">static page fruits/flower/static1/mango</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= base_url("testimage")?>">testimage</a></li>
            <li><a class="dropdown-item" href="<?= base_url("pngtojpg")?>">pngtojpg</a></li>
            <li><a class="dropdown-item" href="<?= base_url("flip")?>">image flip</a></li>
            <li><a class="dropdown-item" href="<?= base_url("degree90")?>">image rotate 90 deg</a></li>
            <li><a class="dropdown-item" href="<?= base_url("degree180")?>">image rotate 180 deg</a></li>
            <li><a class="dropdown-item" href="<?= base_url("resize")?>">image resize</a></li>
            <li><a class="dropdown-item" href="<?= base_url("textwatermark/hello-from-idb")?>">text watermark</a></li>
            <li><a class="dropdown-item" href="<?= base_url("logowatermark")?>">image watermark</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= base_url("db1")?>">Database 1</a></li>
            <li><a class="dropdown-item" href="<?= base_url("db2")?>">Database 2</a></li>
            <li><a class="dropdown-item" href="<?= base_url("db/insert/cat".time())?>">Create a random category</a></li>
            <li><a class="dropdown-item" href="<?= base_url("db/querybuilder")?>">Query Builder Class</a></li>

          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <ul class="navbar-nav mb-2 mb-lg-0">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Account
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <?php
            if(session()->get("logged_in")){
              ?>
<li><?= anchor("profile","Profile",['class'=>"dropdown-item"]) ?></li>
<li><?= anchor("logout","Logout",['class'=>"dropdown-item"]) ?></li>
              <?php

            }
            else{
?>
<li><?= anchor("login","Login",['class'=>"dropdown-item"]) ?></li>
<li><?= anchor("registration","Register",['class'=>"dropdown-item"]) ?></li>
<?php
            }
            ?>
            
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <!-- dynamic content start -->
<?= $this->renderSection('content') ?>
<!-- dynamic content end -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>