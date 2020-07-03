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
  if($user->checkID()==1){
    # Só executaremos deleteOne() se checkID nos confirma que ese ID existe
    $user->deleteOne();
  }
  header("location: ".$url->baseUrl.$url->virtualPathArray[0]."/list");
  die();

?>