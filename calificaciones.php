<?php
require_once "data.php";
require_once "header.php";
use Illuminate\Database\Capsule\Manager as Capsule;

$list = Capsule::table('usuarios')->select('nombre', 'apellido', 'tipo', 'num_user')->where('tipo', '=', "alumno")->first();
$listcal = Capsule::table('materias')->select('español', 'historia', 'matematicas')->where('usuarios_num_user', '=', $list->num_user)->first();

  echo '
  <table class="table">
  <thead>
    <tr>
      <th><abbr>Nombre</abbr></th>
      <th><abbr>Apellido</abbr></th>
      <th><abbr>Tipo</abbr></th>
      <th><abbr>Num Alumno</abbr></th>
      <th><abbr>Español</abbr></th>
      <th><abbr>Historia</abbr></th>
      <th><abbr>Matematicas</abbr></th>
    </tr>
  <tbody>
    <tr>
      <td>'. $list->nombre. '</td>
      <td>'. $list->apellido.'</td>
      <td>'.$list->tipo.'</td>
      <td>'.$list->num_user.'</td>
      <th>'.$listcal->español.'</th>
      <th>'.$listcal->historia.'</th>
      <th>'.$listcal->matematicas.'</th>
    </tr>
    <tr>
  </tbody>
</table>';