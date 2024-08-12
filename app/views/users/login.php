<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5 mb-7">
      <?php flash('register_success'); ?>
      <h2>Login</h2>
      <p>Please fill in your credentials to login.</p>
      <form action="<?php echo URLROOT; ?>/users/login" method="post">
        <div class="form-group mb-4">
          <label>Email:<sup>*</sup></label>
          <input type="text" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
          <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>
        <div class="form-group">
          <label>Password:<sup>*</sup></label>
          <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
          <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
        </div>
        <div class="form-row mt-4">
          <div class="col">
            <input type="submit" class="btn btn-primary" value="Login">
          </div>
          <div class="col">
            <a href="<?php echo URLROOT; ?>/users/register/1" class="btn btn-light btn-block">No account? Register</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>