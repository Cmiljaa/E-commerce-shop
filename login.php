<?php 

require_once 'inc/header.php'; 
require_once 'app/classes/User.php';

if($user -> isLogged()){
  $response -> redirect("Location: index.php");
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  if(!isset($_POST['username']) || !isset($_POST['password'])){
    $response -> sessionMessage("danger", "Error!");
    exit();
  }

  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = $user -> login($username, $password);

  if(!$result){
    $response -> sessionMessage("danger", "Error!");
    $response -> redirect("Location: login.php");
  }
  
  if($user -> isAdmin()){
    $response -> redirect("Location: admin/index.php");
  }

  if($result){
    $response -> redirect("Location: index.php");
  }

}

?>

    <div class="row justify-content-center" style="margin-top: 70px;">
      <div class="col-md-4">
        <h2 class="text-center">Login</h2>
        <form action="" method="POST">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
          <a href="register.php">Register</a>
        </form>
      </div>
    </div>


<?php require_once 'inc/footer.php'; ?>