<?php 

	$title = 'About';
	$class = 'about';

	if(!empty($_POST)){
	$form['country'] = strip_tags($_POST['country']);
  	 $prepare = $pdo->prepare('INSERT INTO data(user,country) VALUES (:user,:country)');
  	 $prepare->bindValue('user',$_SESSION['auth']->name);
    $prepare->bindValue('country', $form['country']);

    $execute = $prepare->execute();

    if(!$execute)
    	echo'error';
    else
    	echo'complete !';
      
}