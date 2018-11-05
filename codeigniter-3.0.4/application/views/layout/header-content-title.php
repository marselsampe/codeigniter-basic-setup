<!-- Content Header (Page header) -->
<?php
if( isset( $contentTitle ) ){
?>
  <section class="content-header">
    <h1>
      <?= $contentTitle ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= $contentTitle ?></li>
    </ol>
  </section>
<?php
}
?>