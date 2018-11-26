<div class="row">
  <div class="col-md-6">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Profile</h3>
      </div>
      <div class="box-body">
        <?php if ($this->session->flashdata('msg_success')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('msg_success') ?> </div>
        <?php } ?>
        <?php if ($this->session->flashdata('msg_error')) { ?>
        <div class="alert alert-danger"> <?= $this->session->flashdata('msg_error') ?> </div>
        <?php } ?>

        <form action="<?= base_url('users/profilesetting') ?>" method="post">
          <div class="form-group">
            <label>Nama</label>
            <input name="name" type="text" class="form-control" value="<?php if(isset($input)) echo $input->name; ?>">
          </div>
          <div class="form-group">
            <label>Status</label>
            <input name="status" type="text" class="form-control" value="<?php if(isset($input)) echo $input->status; ?>" readonly>
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
            <input name="password" type="password" class="form-control" value="<?php if($_POST) if(isset($input)) echo $input->password; ?>">
            <span style="color:red; font-size:12px;"><i>Kosongkan jika tidak ingin diedit</i></span>
          </div>
          <div class="form-group">
            <label>Re-Password</label>
            <input name="repassword" type="password" class="form-control" value="<?php if($_POST) if(isset($input)) echo $input->repassword; ?>">
            <span style="color:red; font-size:12px;"><i>Kosongkan jika tidak ingin diedit</i></span>
          </div>
          <input name="isActive" type="hidden" value="1">

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>
    </div>

  </div>
</div>