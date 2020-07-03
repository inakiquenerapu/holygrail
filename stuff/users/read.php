<?php if(!defined("PANXOLINHAS")):header("location: ".$url->baseUrl);die();endif; ?>
<?php

# PÁXINA PÚBLICA.
# NON PREGUNTAMOS
# SE ESTÁ LOGUEADO/A OU NON



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

  $user->readOne();

  include("./theme/head.php");
  include("./theme/nav.php");

?>

<h1><?=$user->data["name"];?> <?=$user->data["surname"];?></h1>

<?php

  include("./theme/footer.php");

?>