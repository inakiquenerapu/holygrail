<?php if(!defined("PANXOLINHAS")):header("location: ".$url->baseUrl);die();endif; ?>
<?php if (count($user->list) > 0) { ?>

<table border=1>

  <tr>
    <th>Nome</th>
    <th>Apelido(s)</th>
    <th>Accións</th>
  </tr>

<?php foreach ($user->list as $key => $value) { ?>

  <tr>
    <td><?=$value["name"];?></td>
    <td><?=$value["surname"];?></td>
    <td>
      <a href="<?=$url->baseUrl.$url->virtualPathArray[0];?>/edit/<?=$value["id"];?>">Editar</a> |
      <a href="<?=$url->baseUrl.$url->virtualPathArray[0];?>/delete/<?=$value["id"];?>"
         onclick="if(!confirm('Estás seguro/a?')) return false;">Eliminar</a>
    </td>
  </tr>

<?php } ?>

</table>

<?php } ?>