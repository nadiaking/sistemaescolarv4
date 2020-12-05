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
if($loggedin){

  echo '
  <br><br>
  <div class="columns is-mobile">
  <div class="column">
      <div class="card">
  <div class="card-image">
    <figure class="image is-4by3">
      <img src="Imagenes/español.jfif" alt="Placeholder image">
    </figure>
  </div>
  <div class="card-content">
    <div class="media">
      <div class="media-left">
        <figure class="image is-48x48">
        </figure>
      </div>
      <div class="media-content">
        <p class="title is-4">Materia:</p>
        <p class="subtitle is-6">Materia de español</p>
      </div>
    </div>

    <div class="content">
    Sin tareas pendientes por el momento..
si desea consultar sus calificaciones vayan al apartado de calificaciones!          <br>
      <br>
      <br>
      <br>
      <br>
    </div>
  </div>
</div></div>
  <div class="column">
  <div class="card">
  <div class="card-image">
    <figure class="image is-4by3">
      <img src="Imagenes/historia.jfif" alt="Placeholder image">
    </figure>
  </div>
  <div class="card-content">
    <div class="media">
      <div class="media-left">
        <figure class="image is-48x48">
          
        </figure>
      </div>
      <div class="media-content">
        <p class="title is-4">Materia:</p>
        <p class="subtitle is-6">Materia de Historia</p>
      </div>
    </div>

    <div class="content">
    Sin tareas pendientes por el momento...
    si desea consultar sus calificaciones vayan al apartado de calificaciones! 
    <br>
    <br>
    <br>
    <br>
      <br>
    </div>
  </div>
</div>
  </div>
  <div class="column"><div class="card">
  <div class="card-image">
    <figure class="image is-4by3">
      <img src="Imagenes/mate.jfif" alt="Placeholder image">
    </figure>
  </div>
  <div class="card-content">
    <div class="media">
      <div class="media-left">
        <figure class="image is-48x48">
          
        </figure>
      </div>
      <div class="media-content">
        <p class="title is-4">Materia:</p>
        <p class="subtitle is-6">Materia de matematicas</p>
      </div>
    </div>

    <div class="content">
    Sin tareas pendientes por el momento..
si desea consultar sus calificaciones vayan al apartado de calificaciones!          <br>
      <br>
      <br>
      <br>
      <br>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
    
  
';

          

  echo <<<_END
      </div><br>
    </div>
    <div data-role="footer">
    </div>
  </body>
</html>
_END;
}
else
{
  echo'
  <meta http-equiv="Refresh" content="0;url=inicio_alumno.php">
  </div></body></html>
  ';  

}