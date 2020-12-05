<?php
      require_once "data.php";
      require_once "header.php";
      use Illuminate\Database\Capsule\Manager as Capsule;
      $sql = Capsule::table('usuarios')->select('nombre', 'apellido', 'tipo', 'num_user')->where('tipo', '=', "alumno")->get();


      echo '
      <div class="columns">
      <div class="column is-two-fifths is-offset-one-fifth">
          <form action="api/index.php/calificaciones1" method="post">
              <br>
              <p>seleccione nombre del alumno al que desea modificar la calificación</p>
              <div class="control">
                  <div class="select">
                      <select name="alumno">';
      foreach($sql as $list){
        echo "<option value='".$list->num_user."'> ".$list->nombre."</option>"; 
         }
      echo '</select>
      </div>
      </div>
      <p>Calificacion de Español: </p>
      <p class="control">
       <input class="input" type="int" name="cal1" placeholder="ingrese calificacion de español"> 
      </p></form>
      <br>      
      <input class="button is-primary" type="button" value="Enviar"
      onclick="cali1()">


      <form action="api/index.php/calificaciones2" method="post">
      <br>  
      <div class="control">
                  <div class="select">
                      <select name="alumno">';
      foreach($sql as $list){
        echo "<option value='".$list->num_user."'> ".$list->nombre."</option>"; 
         }
      echo '</select> </div>
            <p>Calificacion de Historia: </p>

      <p class="control">
          <input class="input" type="int" name="cal2" placeholder="ingrese calificacion de historia">
      </p></form>
      <br>      
      <input class="button is-primary" type="button" value="Enviar"
      onclick="cali2()">


      <form action="api/index.php/calificaciones3" method="post">
      <br>  
      <div class="control">
                  <div class="select">
                      <select name="alumno">';
      foreach($sql as $list){
        echo "<option value='".$list->num_user."'> ".$list->nombre."</option>"; 
         }
      echo '</select>
      </div>
            <p>Calificacion de Matematicas: </p>
      <p class="control">
          <input class="input" type="int" name="cal3" placeholder="ingrese calificacion de matematicas">
      </p></form>
      <br>
      <input class="button is-primary" type="button" value="Enviar"
          onclick="cali3()">
</div>
</div>
</div>';
?>
<script>
function cali1(){
    axios.post(`api/index.php/calificaciones1/${document.forms[0].alumno.value}`, {
     alumno: document.forms[0].alumno.value,
     cal1: document.forms[0].cal1.value,
        })
        .then(resp =>{
                    if(resp.data.confir){
                     alert(`Calificacion de:  ${resp.data.name} actualizada`)
            }
            else
            {
                alert(`El alumno ya tiene esa calificación`)
            }
        
        })
        .catch(error =>{
            console.log(error);
        });
}
</script>
<script>
function cali2(){
    axios.post(`api/index.php/calificaciones2/${document.forms[1].alumno.value}`, {
     alumno: document.forms[1].alumno.value,
     cal2: document.forms[1].cal2.value,
        })
        .then(resp =>{
                    if(resp.data.confir){
                     alert(`Calificacion de:  ${resp.data.name} actualizada`)
            }
            else
            {
                alert(`El alumno ya tiene esa calificación`)
            }
        
        })
        .catch(error =>{
            console.log(error);
        });
}
</script>

<script>
        function cali3(){
      axios.post(`api/index.php/calificaciones3/${document.forms[2].alumno.value}`, {
     alumno: document.forms[2].alumno.value,
     cal3: document.forms[2].cal3.value,
  })
  .then(resp =>{
                    if(resp.data.confir){
                        alert(`Calificacion de:  ${resp.data.name} actualizada`)
            }
            else
            {
                  alert(`El alumno ya tiene esa calificación`)
            }
        
        })
        .catch(error =>{
            console.log(error);
        });
}


</script>  