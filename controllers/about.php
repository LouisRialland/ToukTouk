<?php 

	$title = 'About';
	$class = 'about';
  $check='false';
	if(!empty($_POST)){
     $data = $pdo->query('SELECT * FROM data ORDER BY country');
     $datas = $data->fetchALL();
	   $form['country'] = strip_tags($_POST['country']);
     foreach ($datas as $_datas):
     if ($form['country']==$_datas->country) {
       $check='true';
       $save=$_datas->user;

       $prepare = $pdo->prepare("UPDATE  data SET user=:user ,iteration=iteration+1 WHERE country=:country");
       $prepare->bindValue('user',$save .', '.$_SESSION['auth']->name);
       $prepare->bindValue('country',$form['country']);
       $execute = $prepare->execute();
     }
     endforeach;
     
     
    
}