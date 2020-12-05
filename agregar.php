<?php
require_once "data.php";
require_once "header.php";
use Illuminate\Database\Capsule\Manager as Capsule;

      echo '
      <div class="columns">
      <div class="column is-two-fifths is-offset-one-fifth">
          <form action="api/index.php/calificaciones" method="post">
              <br>
              <p>seleccione nombre del alumno al que desea cambiar la calificación</p>
              <div class="control">
                  <div class="select">
                      <select name="alumno">';
      $sql = Capsule::table('usuarios')->select('nombre', 'apellido', 'tipo', 'num_user')->where('tipo', '=', "alumno")->get();
      foreach($sql as $list){
        echo "<option value='".$list->num_user."'> ".$list->nombre."</option>"; 
         }
      echo '</select>
      </div>
      </div>
      <p>Calificacion de Español: </p>
      <p class="control">
          <input class="input" type="int" name="cal1"
              placeholder="ingrese calificacion de español">
      </p>
      <br>
       <p>Calificacion de Historia: </p>

      <p class="control">
          <input class="input" type="int" name="cal2"
              placeholder="ingrese calificacion de historia ">
      </p>
      <br>
      <p>Calificacion de Matematicas: </p> 
            <p class="control">
          <input class="input" type="int" name="cal3"
              placeholder="ingrese calificacion de matematicas">
      </p>
      <br>
    </form>
      <input class="button is-primary" type="button" value="Enviar"
          onclick="cal()">
</div>
</div>
</div>';

?>
<script>
function cal(){
    axios.post( `api/index.php/calificaciones/${document.forms[0].alumno.value}`, {
     alumno: document.forms[0].alumno.value,
     cal1: document.forms[0].cal1.value,
     cal2: document.forms[0].cal2.value,
     cal3: document.forms[0].cal3.value,
  }).then(resp =>{
    if (resp.data.existe)
    {
      alert(`Calificaciones del alumno ${resp.data.name} subidas con exito! `)


    }
    else
    {
      alert(`Ya existen las calificaciones del alumno: ${resp.data.name}, si desea cambiarlas vaya a actualizar.`)

    }

  })
  .catch(error =>{
    console.log(error);
  });


}

</script>