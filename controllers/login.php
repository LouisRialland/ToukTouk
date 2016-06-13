<?php

$title = 'Login';
$class = 'login';
//the user is already logged ?
if (isset($_SESSION['auth'])){
  reconnect_from_cookie();

  //if yes we redirect him to the home
  header('Location: '.URL);
  exit();
}
//check if he have fill all the form
if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password']) ){
  //call db
  $login = $pdo->prepare('SELECT * FROM login WHERE (name = :username OR email = :username)');
  
  $login->execute(['username' => $_POST['username']]);
  $user = $login->fetch();
          
       

  
  //if password is corred, the password verify who decrypt the password find a match with the db

  if(password_verify($_POST['password'], $user->password)){
    //so we log the user
    $_SESSION['auth']= $user;
    if(!empty($_POST['remember'])){
      //token for the broswer cookie
      $remember_token = str_random(250);
      //this token must match the db token to autoconenct
      $pdo->prepare('UPDATE login SET remember_token = ? WHERE id = ?')->execute([$remember_token, $user->id]);
      setcookie('remember', $user->id.'=='.$remember_token.sha1($user->id. 'brunosimon') , time() + 60  *60  * 24 * 7);
    }
    //to the home
    header('Location: '.URL);
    exit();
  }
  else {
    //TO DO : buy memo
    echo 'Le mot de passe est invalide.';
  }

}
else {
  //damnit it was only 2 fields !!
//  echo 'vous n\'avez pas rempli le formulaire';
}
