<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-dark mt-5">
        <h2 style="color:antiquewhite">Login</h2>
        <p style="color:antiquewhite">Please fill in your credentials to log in</p>
        <form action="<?php echo URLROOT; ?>/users/login" method="post">
          <div class="form-group">
            <label for="email" style="color:antiquewhite">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
          </div>
          <div class="form-group">
            <label for="password" style="color:antiquewhite">Password: <sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_error']; ?></span>
          </div>
          <div class="row">
            <div class="col">
              <input type="submit" value="Login" class="btn btn-success btn-block">
            </div>
            <div class="col">
              <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-dark btn-block">No account? Register</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>