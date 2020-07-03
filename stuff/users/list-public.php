<?php if(!defined("PANXOLINHAS")):header("location: ".$url->baseUrl);die();endif; ?>
<?php if (count($user->list) > 0) { ?>

<?php foreach ($user->list as $key => $value) { ?>

<h1><a href="<?=$url->baseUrl.$url->virtualPathArray[0];?>/read/<?=$value["id"];?>"><?=$value["name"];?> <?=$value["surname"];?></a></h1>

<hr>

<?php } ?>

<?php } ?>
