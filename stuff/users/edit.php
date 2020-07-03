<?php if(!defined("PANXOLINHAS")):header("location: ".$url->baseUrl);die();endif; ?>
<?php

  if(!defined("LOGUEADO")){
    # Non estás logueado/a? Fóra de aquí!
    header("location: ".$url->baseUrl.$url->virtualPathArray[0]."/list");
    die();
  }

  if(!isset($url->virtualPathArray[2]) || $url->virtualPathArray[2]==""){
    # Non traes un ID? Fóra de aquí!
    header("location: ".$url->baseUrl.$url->virtualPathArray[0]."/list");
    die();
  }

  $user = new Users($db);
  $user->id = $url->virtualPathArray[2];
  if($user->checkID()==0){
    # Traes un ID que non existe? Fóra de aquí!
    header("location: ".$url->baseUrl.$url->virtualPathArray[0]."/list");
//  echo "Esa ficha non existe";
    die();
  }

  if(isset($_POST["send"])){
    # Hei, que traemos os datos do formulario vía POST!
    # ADIANTE!
    $user->name = $_POST["name"];
    $user->surname = $_POST["surname"];
    $user->id = $_POST["id"];
    $user->updateOne();
    header("location: ".$url->baseUrl.$url->virtualPathArray[0]."/list");
    die();
  }

  $user->readOne();

  include("./theme/head.php");
  include("./theme/nav.php");

?>

<h1>Editar ficha</h1>

<form method="post">
  <div>
    <label for="name">Nome:</label>
    <input type="text" name="name" value="<?=$user->data["name"];?>" />
  </div>

  <div>
    <label for="surname">Apelidos:</label>
    <input type="text" name="surname" value="<?=$user->data["surname"];?>" />
  </div>

  <div>
    <input type="hidden" name="id" value="<?=$user->data["id"];?>" />
    <input type="submit" name="send" value="Actualizar" />
  </div>
</form>

<?php

  include("./theme/footer.php");

?>
