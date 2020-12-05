<?php
  require_once 'data.php';

echo <<<_INIT
<!DOCTYPE html> 
<html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  

    <link rel="stylesheet" href="node_modules/bulma/css/bulma.min.css">
    
    <script src="node_modules/axios/dist/axios.min.js"></script>
_INIT;

  require_once 'funciones.php';

if(!$loggedin){
echo <<<_MAIN
<title>Sistema Escolar</title>
</head>

<body>

    <section class="hero is-info">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Escuela Preparatoria General N° 126
                </h1>
                <h2 class="subtitle">
                    9 de 10 estrellas en todo el pais!
                </h2>
            </div>
        </div>
    </section>


    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">

            <img src="Imagenes/escuela.png" width="108" height="27">

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="index.php">
            Home
          </a>
            </div>
        </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-primary" href="signup.php">
                        <strong>Sign up</strong>
                    </a>
                    <a class="button is-light" href="login.php">
                Log in
              </a>
                </div>
            </div>
        </div>
        </div>
    </nav>
_MAIN;
}

if ($loggedin)
  {
echo'
<title>Sistema Escolar</title>
</head>

<body>

    <section class="hero is-info">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Escuela Preparatoria General N° 126
                </h1>
                <h2 class="subtitle">
                    9 de 10 estrellas en todo el país!
                </h2>';
                echo '<h1 class="subtitle">Bienvenido nuevamente, '. $name .'.
            </div>
        </div>
    </section>


    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">

            <img src="Imagenes/escuela.png" width="108" height="27">

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="index.php">
            Home
          </a>';
          if($tipo == "alumno")
          {
            echo'
                <a class="navbar-item" href="calificaciones.php">
            Calificaciones
          </a>
                <a class="navbar-item" href="promedio.php">
              Promedio
              </a>';
              
          }
          if($tipo == "maestro")
          {
            echo'
                <a class="navbar-item" href="agregar.php">
            Agregar
          </a>
          <a class="navbar-item" href="actualizar.php">
          Actualizar
        </a>
        <a class="navbar-item" href="borrar.php">
        borrar
      </a>';
          }
        echo'    </a>
            </div>
        </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-primary" href="signup.php">
                        <strong>Sign up</strong>
                    </a>
                    <a class="button is-light" href="logout.php">
                Log out
              </a>
                </div>
            </div>
        </div>
        </div>
    </nav>';

  }
?>