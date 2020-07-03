<?php if(!defined("PANXOLINHAS")):header("location: ".$url->baseUrl);die();endif; ?>
<?php

    if(!defined("LOGUEADO")){
    # Non estás logueado/a? Fóra de aquí.
    header("location: ".$url->baseUrl.$url->virtualPathArray[0]."/list");
    die();
  }

# Hei, que traemos os datos do formulario vía POST!

  if(isset($_POST["send"])){
    $user = new Users($db);
    $user->name = $_POST["name"];
    $user->surname = $_POST["surname"];
    $user->addOne();
    header("location: ".$url->baseUrl.$url->virtualPathArray[0]."/list");
    die();
  }

  include("./theme/head.php");
  include("./theme/nav.php");

?>

<h1>Crear nova ficha</h1>

<form method="post">
  <div>
    <label for="name">Nome:</label>
    <input type="text" name="name" value="" />
  </div>

  <div>
    <label for="surname">Apelidos:</label>
    <input type="text" name="surname" value="" />
  </div>

  <div>
    <input type="submit" name="send" value="Crear" />
  </div>
</form>

<?php

  include("./theme/footer.php");

?>
