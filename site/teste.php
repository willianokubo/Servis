<?php
if (isset($_GET["pass"])){
    echo '<script>confirm("Senha alterada com sucesso!");</script>';
  }

require("template/header.php");
require("template/nav_index.php");

?>
<br>
<div class="row">
  <div class="col-sm-6 col-md-3">
    <div class="thumbnail">
      <img src="img/img_perfil/no_user_icon.png" alt="Avatar" width="50%" class="img-circle">
      <div class="caption">
        <h3>Thumbnail label</h3>
        <p>...</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-3">
    <div class="thumbnail">
      <img src="img/img_perfil/no_user_icon.png" alt="Avatar" width="50%" class="img-circle">
      <div class="caption">
        <h3>Thumbnail label</h3>
        <p>...</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-3">
    <div class="thumbnail">
      <img src="img/img_perfil/no_user_icon.png" alt="Avatar" width="50%" class="img-circle">
      <div class="caption">
        <h3>Thumbnail label</h3>
        <p>...</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

<div class="col-sm-6 col-md-3">
  <div class="thumbnail">
    <img src="img/img_perfil/no_user_icon.png" alt="Avatar" width="50%" class="img-circle">
    <div class="caption">
      <h3>Thumbnail label</h3>
      <p>...</p>
      <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
    </div>
  </div>
</div>

</div>

<?php
require("template/footer.php");
?>
