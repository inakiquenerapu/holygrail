<p>

    <a href="<?=$url->baseUrl;?>">Home</a>
  | <a href="<?=$url->baseUrl;?>users">Users</a>
  | <a href="<?=$url->baseUrl;?>dogs">Dogs</a>
<?php if(
            defined("LOGUEADO")
         && (isset($url->virtualPathArray[0]) && $url->virtualPathArray[0] != "login")
        ){ ?>
  | <a href="<?=$url->baseUrl;?>?logout">Pechar sesión</a>
<?php } else { ?>
  | <a href="<?=$url->baseUrl;?>login">Abrir sesión</a>
<?php } ?>

</p>

<?php

  if($sec) {

    include("./theme/subnav.php");

  }

?>