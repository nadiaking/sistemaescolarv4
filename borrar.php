<?php
require_once "data.php";
require_once "header.php";
use Illuminate\Database\Capsule\Manager as Capsule;

$sql = Capsule::table('usuarios')->select('nombre', 'apellido', 'tipo', 'num_user')->where('tipo', '=', "alumno")->get();

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    Capsule::table('materias')->where('usuarios_num_user', $id)
    ->update(['español' => 0]);
    Capsule::table('materias')->where('usuarios_num_user', $id)
    ->update(['matematicas' => 0 ]);
    Capsule::table('materias')->where('usuarios_num_user', $id)
    ->update(['historia' => 0]);
}
foreach($sql as $list){
  echo '
  <table class="table">
  <thead>
    <tr>
      <th><abbr>Nombre</abbr></th>
      <th><abbr>Apellido</abbr></th>
      <th><abbr>Tipo</abbr></th>
      <th><abbr>Num Alumno</abbr></th>
      <th><abbr>Borrar</abbr></th>

    </tr>
  <tbody>
    <tr>
     <td>'. $list->nombre. '</td>
      <td>'. $list->apellido.'</td>
      <td>'.$list->tipo.'</td>
      <td>'.$list->num_user.'</td>
      <td><a type="button" href="borrar.php? id=' . $list->num_user .'" class="button is-primary linkdel" onclick="borrar()">Borrar</a>
      </td>
    </tr>
    <tr>
  </tbody>
</table>';
}
?>
<script>
    function borrar(){
        alert("Calificaciones del alumno borradas.")
    }

</script>