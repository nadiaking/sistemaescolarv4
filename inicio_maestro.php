<?php
   use Illuminate\Database\Capsule\Manager as Capsule;
  require_once 'data.php';
  require_once 'header.php';

  if(!$loggedin){
    if(isset($_GET['user']))
    {
      $usuario = $_GET['user'];
      $_SESSION['user'] = $usuario;
    }
      }
      $sql = Capsule::table('usuarios')->select('nombre', 'apellido', 'tipo')->where('tipo', '=', "alumno")->get();
if($loggedin){
      echo "Lista de alumnos: <br>";
          foreach($sql as $list){
            echo '
            <table class="table">
            <thead>
              <tr>
                <th><abbr>Nombre</abbr></th>
                <th><abbr>Apellido</abbr></th>
                <th><abbr>Tipo</abbr></th>
              </tr>
            </tfoot>
            <tbody>
              <tr>
                <th>'. $list->nombre. '</th>
                <td>'. $list->apellido.'</td>
                <td>'.$list->tipo.'</td>
              </tr>
              <tr>
            </tbody>
          </table>';
            }
          }
          else{
            echo'
            <meta http-equiv="Refresh" content="0;url=inicio_maestro.php">
            </div></body></html>
            ';
          }
?>





