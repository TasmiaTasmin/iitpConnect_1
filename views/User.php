<?php

  $router = new Router;

  if($router->get('u'))
  {
    $use = $router->get('u');
    $user = User::getUser($use);
  }
  else
  {
    header('Location: ' . BASE_URL);
  }
 ?>
 
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>

<?php if(!$user):

  require_once PATH_TEMPLATES . '/404.php';
  exit();
  endif;
?>

<h2 style="text-align:center">User Profile Card</h2>

<div class="card">
  <?php if(file_exists("uploads/".$user['username']."/profileimage")): ?>
  <img src="uploads/<?php echo $user['username']; ?>/profileimage" alt="John" style="width:100%">
<?php else: ?>
        <img id="user-image" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
<?php endif; ?>
  <h1><?php echo $user['name']; ?></h1>
  <p class="title"><?php echo $user['email']; ?></p>
  <p><?php echo $user['params']; ?></p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a>
    &nbsp;
    <a href="#"><i class="fa fa-twitter"></i></a>
    &nbsp;
    <a href="#"><i class="fa fa-linkedin"></i></a>
    &nbsp;
    <a href="#"><i class="fa fa-facebook"></i></a>
 </div>
 <p><button>Contact</button></p>
</div>

</body>
</html>
