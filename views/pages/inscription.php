
<!--        show erros if they exists-->
<?php if(!empty($errors)): ?>
  <div class="errors">
    <?php foreach ($errors as $_error): ?>
      <div><?= $_error ?></div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
<!--        show success if they exists-->
<?php if(!empty($success)): ?>
  <div class="success">
    <?php foreach ($success as $_success): ?>
      <div><?= $_success ?></div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>




<div class="signup">


  <!--        a lot of br #sorry-->
  <form action="#" method="post" enctype="multipart/form-data" class="">
    <div class="form-group" >
      <label for="name">Votre pseudo (sans espace, chiffres ou lettres seulement) :</label>
      <br>
      <input type="text" name="name" class="form-control"required>
    </div>

    <div class="form-group">


      <label for="name">Votre mot de passe :</label>
      <br>
      <input type="password" name="password" id="password" class="form-control" required>
      <span></span>
    </div>
    <div class="form-group">
      <label for="mail">Votre Email :</label>
      <br>
      <input name="email" type="email"  class="form-control" required>
    </div>
    <input type="submit" value="S'inscrire"  class="btn btn-default">
  </form>
</div>

<script type="text/javascript">
var toogle = false;
var button_password = document.querySelector('.signup form span');
var input_password = document.getElementById('password');
button_password.addEventListener('click', function(){
  if (toogle){
    input_password.setAttribute('type', 'password');
    toogle = false;
    input_password.nextSibling.nextSibling.className= "";

  }
  else {
    input_password.setAttribute('type', 'text');
    toogle = true;
    input_password.nextSibling.nextSibling.className= "view";

  }
  input_password.nextSibling.nextSibling
});
</script>
