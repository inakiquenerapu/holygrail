<?php if(!defined("PANXOLINHAS")):header("location: ".$url->baseUrl);die();endif; ?>
<?php

  if(defined("LOGUEADO")){
    # Estás logueado/a? Entón que fas aquí? Fóra de aquí!
/*
    echo("location: ".$url->baseUrl);
    echo "OH!";
    die();
*/
    header("location: ".$url->baseUrl);
    die();
  }

  if(
    isset($_POST["login_username"]) &&
    isset($_POST["login_password"])
    ){
      $login->username = $_POST["login_username"];
      $login->password = $_POST["login_password"];
      $login->checkLoginForm();
  }

  include("./theme/head.php");
  include("./theme/nav.php");

?>

<h1>Abrir sesión</h1>

<?php if (isset($login->wrong)) { ?>
    <p>Houbo un erro no login</p>
<?php } ?>

<form method="post">
  <div>
    <label for="login_usuario">Usuario/a:</label>
    <input type="text" name="login_username" value="" />
  </div>

  <div>
    <label for="login_contrasinal">Contrasinal:</label>
    <input type="password" name="login_password" value="" />
  </div>

  <div>
    <input type="submit" name="login" value="Entrar" />
  </div>
</form>

<?php

  include("./theme/footer.php");

?>