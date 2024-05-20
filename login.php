<?php require_once 'inc/header.php'; ?>

    <div class="row justify-content-center" style="margin-top: 70px;">
      <div class="col-md-4">
        <h2 class="text-center">Login</h2>
        <form action="" method="POST">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
          <a href="register.php">Register</a>
        </form>
      </div>
    </div>


<?php require_once 'inc/footer.php'; ?>