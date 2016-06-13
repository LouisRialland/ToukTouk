<?php
//we get the token and the user id to match them in the db


$user_id = $_GET['id'];
$token = $_GET['token'];
//we get the datas from the db
$req = $pdo->query('SELECT * FROM users WHERE id = '.$user_id);
//the moment of truth
$user = $req->fetch();

// if everithing is oj
if($user && $user->confirmation_token){
  $_SESSION['auth'] = $user;
  //remove token, the account is confirmed
  $pdo->prepare('UPDATE users SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = '.$user_id)->execute();
  //now you can play
  header('Location: '.URL);
  exit();

}
else {
  //if the id or token doest match with db
  die('your id or token does not match, please sign again');
}
