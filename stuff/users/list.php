<?php if(!defined("PANXOLINHAS")):header("location: ".$url->baseUrl);die();endif; ?>
<?php

# PÁXINA PÚBLICA.
# NON PREGUNTAMOS
# SE ESTÁ LOGUEADO/A OU NON



  $user = new Users($db);
  $user->search = isset($_GET["s"]) ? $_GET["s"] : "";
  $user->listAll();

  include("./theme/head.php");
  include("./theme/nav.php");

?>

<h1>Listado</h1>

<form method="get">
  <div>
    <input type="text" name="s" value="<?=$user->search;?>" />
    <input type="submit" value="Buscar" />
  </div>
</form>

<?php

    if(defined("LOGUEADO")){
      include("list-admin.php");
    }else{
      include("list-public.php");
    }

  include("./theme/footer.php");

?>