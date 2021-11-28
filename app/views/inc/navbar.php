<nav class="navbar navbar-dark bg-dark" aria-label="First navbar example" style="color: antiquewhite">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" style="color:antiquewhite">Shared Posts</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample01">
        <ul class="navbar-nav me-auto mb-2">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?php echo URLROOT; ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>pages/about">About</a>
          </li>
          <?php if(isset($_SESSION['user_id'])) :?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>users/logout">Logout</a>
          </li>
          <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>users/register">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>users/login">Login</a>
          </li>
        </ul>
        <?php endif; ?>
        <form>
          <input class="form-control" type="text" placeholder="Search" aria-label="Search">
        </form>
      </div>
    </div>
  </nav>
  <br />