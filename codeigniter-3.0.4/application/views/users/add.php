<div class="row">
  <div class="col-md-6">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah User</h3>
      </div>
      <div class="box-body">
        <?php if ($this->session->flashdata('msg_error')) { ?>
        <div class="alert alert-danger"> <?= $this->session->flashdata('msg_error') ?> </div>
        <?php } ?>

        <form action="<?= base_url('users/add') ?>" method="post">
          <div class="form-group">
            <label>Nama</label>
            <input name="name" type="text" class="form-control" value="<?php if(isset($input)) echo $input->name; ?>">
          </div>
          <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control select2" style="width: 100%;">
              <option><?= isset($input) ? $input->status : '' ?></option>
              <option>Administrator</option>
              <option>Reguler User</option>
            </select>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input name="email" type="text" class="form-control" value="<?php if(isset($input)) echo $input->email; ?>">
          </div>
          <div class="form-group">
            <label>Username</label>
            <input name="username" type="text" class="form-control" value="<?php if(isset($input)) echo $input->username; ?>">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input name="password" type="password" class="form-control" value="<?php if(isset($input)) echo $input->password; ?>">
          </div>
          <div class="form-group">
            <label>Re-Password</label>
            <input name="repassword" type="password" class="form-control" value="<?php if(isset($input)) echo $input->repassword; ?>">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>
    </div>

  </div>
</div>