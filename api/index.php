<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as Capsule;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/database.php';


// Instantiate app
$app = AppFactory::create();
$app->setBasePath("/sistemaescolarv4/api/index.php");

// Add Error Handling Middleware
$app->addErrorMiddleware(true, false, false);

// Add route callbacks
$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write('Hello World');
    return $response;
});
$app->post('/login/{user}', function (Request $request, Response $response, array $args) {

    $data  = json_decode($request->getBody()->getContents(), false);
    $usuario =  ($args['user']);
    $pass =  $data->pass;
    $user = Capsule::table('usuarios')->select(['usuario', 'contraseña', 'tipo'])->where('usuario', $usuario)->where('contraseña', $pass)->first();


    $msg =  new stdClass();
    if ($user->usuario == $data->user || $user->contraseña == $data->pass  ){
    $msg->afirmativo = true;
    $msg->nombre =  $user->usuario;
    $msg->wea = $usuario;
    if($user->tipo == "alumno")
    {
        $msg->type= true;
    }
    else
    {
        $msg->type = false;

    }

    }else{
        $msg->afirmativo  =  false;
    }

    
    $response->getBody()->write(json_encode($msg));
    return $response;
});
$app->post('/signup/{user}', function (Request $request, Response $response, array $args) {
    $data = json_decode($request->getBody()->getContents(), false);
   $users =  $args['user'];
   $pass =  $data->pass;
   $apellido  = $data->apellido;
    $nombre = $data->nombre;

   $sig =  new stdClass();
   if ($data->pass  == "" || $data->apellido == ""  ){
   $sig->afirmativo = false;
   }else{
       $result = Capsule::table('usuarios')->where('usuario', '=' , $users)->first();
if($result){
   if ($result->usuario==$nombre){
   $sig->error = 'Ya existe ese usuario.';
   $sig->repetido =  true;
   }
}
else
{ 
 
 $sig->repetido = false;
$sig->afirmativo  =  true;
$sig->wea = $args['user'];
$pass =  $data->pass;
$apellido  = $data->apellido;
Capsule::table('usuarios')->insert(['usuario' => $args['user'], 'nombre' => $nombre, 'apellido' => $apellido, 'contraseña' => $pass, 'tipo'=> 'alumno', ]);
}
}
    $response->getBody()->write(json_encode($sig));
            
            return $response;
        });
        $app->post('/signup/', function (Request $request, Response $response, array $args) {
            $data = json_decode($request->getBody()->getContents(), false);
            $nombre =  $args['user'];
            $pass =  $data->pass;
            $apellido  = $data->apellido;
            if ($data->user == "" || $data->pass  == "" || $data->apellido == ""  ){
                $name->afirmativo = false;
            }
            $response->getBody()->write(json_encode($sig));
            
            return $response;
        });
$app->post('/calificaciones/{numuser}', function (Request $request, Response $response, array $args) {

    $data = json_decode($request->getBody()->getContents(), false);


    $name = Capsule::table('usuarios')->where('num_user', $args['numuser'])->first();

    $msg = new stdClass();

    if($name)
    {
        $msg->name = $name->nombre ." ". $name->apellido;

        $validar = Capsule::table('materias')->where('usuarios_num_user',$args['numuser'])
        ->first();
        if(!$validar)
        {
            $msg->existe = true;

            $calificaciones = Capsule::table('materias')->insertOrIgnore(
                ['usuarios_num_user' => $data->alumno, 'español' => $data->cal1, 'historia' => $data->cal2, 'matematicas' => $data->cal3]
            );
            if($calificaciones)
            {
                $msg->insert = true;
            }
            else {
                $msg->insert = false;
            }
        }
        else {
            $msg->existe = false;
        }
    }
    else {
        $msg->existe = false;
    }



    $response->getBody()->write(json_encode($msg));
    return $response;
});
$app->post('/calificaciones1/{alumno}', function (Request $request, Response $response, array $args) {
    $data = json_decode($request->getBody()->getContents(), false);
    $cal1 = $data->cal1;
    $name = Capsule::table('usuarios')->where('num_user', $args['alumno'])->first();

    $msg = new stdClass();

    if($name)
    {
        $msg->name = $name->nombre ." ". $name->apellido;


              $calificaciones =  Capsule::table('materias')->where('usuarios_num_user', $args['alumno'])
                ->update(['español' => $cal1]);
          
            if($calificaciones)
            {
                $msg->confir = true;
            }
            else {
                $msg->confir = false;
            }
        }
        $response->getBody()->write(json_encode($msg));
        return $response;
    });
    $app->post('/calificaciones2/{alumno}', function (Request $request, Response $response, array $args) {
        $data = json_decode($request->getBody()->getContents(), false);
        $cal2 = $data->cal2;
        $name = Capsule::table('usuarios')->where('num_user', $args['alumno'])->first();
    
        $msg = new stdClass();
    
        if($name)
        {
            $msg->name = $name->nombre ." ". $name->apellido;
    
    
                  $calificaciones =  Capsule::table('materias')->where('usuarios_num_user', $args['alumno'])
                    ->update(['historia' => $cal2]);
              
                if($calificaciones)
                {
                    $msg->confir = true;
                }
                else {
                    $msg->confir = false;
                }
            }
            $response->getBody()->write(json_encode($msg));
            return $response;
        });
        $app->post('/calificaciones3/{alumno}', function (Request $request, Response $response, array $args) {
            $data = json_decode($request->getBody()->getContents(), false);
            $cal3 = $data->cal3;
            $name = Capsule::table('usuarios')->where('num_user', $args['alumno'])->first();
        
            $msg = new stdClass();
        
            if($name)
            {
                $msg->name = $name->nombre . " " . $name->apellido;
        
            
                      $calificaciones =  Capsule::table('materias')->where('usuarios_num_user', $args['alumno'])
                        ->update(['matematicas' => $cal3]);
                  
                    if($calificaciones)
                    {
                        $msg->confir = true;
                    }
                    else {
                        $msg->confir = false;
                    }
                }
                $response->getBody()->write(json_encode($msg));
                return $response;
            });
$app->post('/borrar/{alumno}', function (Request $request, Response $response, array $args) {
                $data = json_decode($request->getBody()->getContents(), false);
                $nombre =  $args['user'];
                $pass =  $data->pass;
                $apellido  = $data->apellido;
                if ($data->user == "" || $data->pass  == "" || $data->apellido == ""  ){
                    $name->afirmativo = false;
                }
                $response->getBody()->write(json_encode($sig));
                
                return $response;
            });            
// Run application
$app->run();