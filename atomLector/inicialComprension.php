<?php 
session_start();

//validacion session

if(!isset($_SESSION['idUsuario'])) {
header('Location: ../index.html');
}



require("../conection/conexion.php");
    
if(empty($_GET['curso'])){

  }else{
    switch ($_GET['curso']) {
      case '7':
        $_SESSION['curso']="Programa Lector - Atomo(Lms)";
        break;
      
      default:
        # code...
        break;
    }
  }

    $tituloGrad="1ero Primaria";
    if(empty($_SESSION['grado'])){
      $gradoBuscar=$_GET['gradoB'];
    }else{
      $gradoBuscar=$_SESSION['grado'];
    }

    $q1 = ("SELECT * FROM atomolector where grado=:grado and noLecturaDiaria=0 and estatus=1 order by idLectura desc");
    $mostrarLectura=$dbConn->prepare($q1);
    $mostrarLectura->bindParam(':grado',$gradoBuscar, PDO::PARAM_INT); 
    $mostrarLectura->execute();
    $cantidadComprension=$mostrarLectura->rowCount();


  @$_GET['curso'];

  //mostramos las vocales
  $objBuscar='vocal';
 $q2 = ("SELECT * FROM aprendizajepreescolar where grado=:grado and descripcion=:descripcion");
    $mostrarVocales=$dbConn->prepare($q2);
    $mostrarVocales->bindParam(':grado',$gradoBuscar, PDO::PARAM_INT); 
    $mostrarVocales->bindParam(':descripcion',$objBuscar, PDO::PARAM_STR); 
    $mostrarVocales->execute();



?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <title><?php echo $_SESSION["nombre"]; ?> | Lecturas Comprensivas</title>
 
    <!-- CSS de Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/navLateralesModPedagogico.css" rel="stylesheet" media="screen">
    <link href="../css/centroPagina.css" rel="stylesheet" media="screen">
    <link href="../css/rol5FuncCursos.css" rel="stylesheet" media="screen">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"><!-- habilitar font famili font-family: 'Ubuntu', sans-serif;-->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Ubuntu" rel="stylesheet"><!-- habilitar font famili font-family: 'Indie Flower', cursive;-->

    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Nunito+Sans|Ubuntu" rel="stylesheet">
 
    <!-- librerias para el funcionamiento del calendario -->
     <!-- JQUERY FUNCIONAL -->
   <script src='../js/jquery.min.js'></script>
    <!-- LIBRERIAS RECONOCIMIENTO DE VOZ -->
  
  <script src="../js/artyom/jquery-3.1.1.js"></script>
  <script src="../js/artyom/artyom.min.js"></script>
  <script src="../js/artyom/artyom.window.js"></script>
  <script src="../js/artyom/artyomCommands.js"></script>



 
  </head>
  <body class="txt-fuente">

  
<!--NAVEGACION CONTENIDO FIJO -->
<?php include '../static/nav.php'; $nivell=1; directorioNivelesNav($nivell);?>
<!-- //NAVEGACION CONTENIDO FIJO -->

<!-- LATERAL IZQUIERDO CONTENIDO FIJO -->
 <?php include '../static/lat-izquierdo.php'; $nivel=1; directoriosNiveles($nivel);?>
<!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->

<!--CENTRANDO CONTENIDO ROL 1 -->
 <style type="text/css">
   
 </style>


 			<div class="col-md-8 col-xs-8 pag-center">
         <div class="col-md-12" style="margin-top: 30px;">
              <h3 class="text-center"><?php echo $_SESSION['curso'];?></h3>
              
         </div>

         <div class="col-md-12" style="">

              <h4 class="text-left">Cuenta Cuentos</h4><hr>

                <div class="row">
              <?php 
              @$i=$cantidadComprension;
              while(@$row1=$mostrarLectura->fetch(PDO::FETCH_ASSOC)){ 
               
                       if($i==$cantidadComprension){
                $llamadaAccion='display:block';
                $borderClic='border:4px solid; border-image: linear-gradient(to right, #C6426E, #642B73)1;';
                $tamanoColumna='col-md-11';
                $leftSemana='text-align: left;margin-left: -0px;margin-top: 30px;';
                $estiloImagen='min-height:232px;';
                $estaSemana='<h2 style="margin-top:45px; text-align:left">Lectura de está semana</h2>';
                $estilosCheckEnviado='width: 40px; height: 40px; position:absolute; margin-top: -11%; margin-left:16%;';
                $estilosCheckVisto='display:none; width: 40px; height: 40px; position:absolute; margin-top: -15%; margin-left:68%;';
                $tamanoCajaDescripcion='col-md-8';
              }else{
                  $llamadaAccion='display:none';
                  $borderClic='';
                  $tamanoColumna='col-md-5';
                  $leftSemana='text-align: left;margin-left: -120px;margin-top: 55px;';
                  $estiloImagen='min-height:160px;';
                  $estaSemana='Lectura de está semana';
                  $estaSemana='';
                  $estilosCheckEnviado='width: 40px; height: 40px; position:absolute; margin-top: -14%; margin-left:10%;';
                  $estilosCheckVisto='display:none; width: 40px; height: 40px; position:absolute; margin-top: -23%; margin-left:68%;';
                  $tamanoCajaDescripcion='col-md-7';

              }  
         
               
                ?>

<style type="text/css">
  /* ondas*/
#state {
  margin:auto;
  width:100px;
  display:block;
  height:100px;
  position:relative;
}
.gps_ring {
    border: 2px solid #1a237e;
    -webkit-border-radius: 50%;
    height: 18px;
    width: 18px;
    position: absolute;
    left:200px;
    top:80px;
    -webkit-animation: pulsate 1s ease-out;
    -webkit-animation-iteration-count: infinite; 
    opacity: 0.0;
}
.gps_ring:before {
    content:"";
    display:block;
    border: 2px solid #1a237e;
    -webkit-border-radius: 50%;
    height: 30px;
    width: 30px;
    position: absolute;
    left:-8px;
    top:-8px;
    -webkit-animation: pulsate 1s ease-out;
    -webkit-animation-iteration-count: infinite; 
    -webkit-animation-delay: 0.1s;
    opacity: 0.0;
}
.gps_ring:after {
    content:"";
    display:block;
    border:2px solid #1a237e;
    -webkit-border-radius: 50%;
    height: 50px;
    width: 50px;
    position: absolute;
    left:-18px;
    top:-18px;
    -webkit-animation: pulsate 1s ease-out;
    -webkit-animation-iteration-count: infinite; 
    -webkit-animation-delay: 0.3s;
    opacity: 0.0;
}
@-webkit-keyframes pulsate {
    0% {-webkit-transform: scale(0.1, 0.1); opacity: 0.0;}
    50% {opacity: 2.0;}
    100% {-webkit-transform: scale(1.2, 1.2); opacity: 0.0;}
}



</style>
                <a href="inicial1/lect1inicial.php?idLectura=<?php echo $row1['idLectura'];?>">
                <div class="<?php echo $tamanoColumna; ?> estiloProducto" style="min-height:230px; margin-bottom: 20px;background-color: #fafafa; <?php echo $borderClic; ?> ">
                <div class="row" style="background-color:#fafafa">

                  <div class="col-md-4" style="<?php echo $estiloImagen; ?> background-image: url(<?php echo $_SESSION['uri'].$row1['rutaLectura'].'1.jpg'; ?>); background-size: 100%; background-repeat:no-repeat; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
                                  
                  </div>
                  
                  <div class="<?php echo $tamanoCajaDescripcion; ?>" style=" min-height: 175px; color: black;">
                    <h4 style=""><?php echo $row1['nombreLectura']; ?></h4>
                    <h5 style="text-align: left;"><?php echo "Tipo Lectura: ".$row1['tipoLectura']; ?></h5>
                    <h5 style="text-align: left;"><?php echo "Descripción: ".$row1['descripcion']; ?></h5>
                    <h5 style="text-align: left;"><?php echo "Edad: ".$row1['edadLectura']; ?></h5>
                    <h4 style="text-align: left;"><span class="label label-primary" style="position:relative;">
                    <h4 style="<?php echo $leftSemana; ?> position:absolute;   "><span class="label label-primary" style="background-color:#3498db; "><?php echo @$row1['semanaMaestro']; ?></span></h4>  
                    <?php echo 'Semana '.$i; ?></span></h4>
                    <?php echo $estaSemana; ?>
                     <?php 
                       $q3 = ("SELECT idRegistro from registropruebacomprension where idLectura=:idLectura and idUsuario=:idUsuario");
                         $buscarIntentos=$dbConn->prepare($q3);
                         $buscarIntentos->bindParam(':idLectura',$row1['idLectura'], PDO::PARAM_INT); 
                         $buscarIntentos->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT); 
                         $buscarIntentos->execute();
                         $sihay=$buscarIntentos->rowCount();
                         
                         if($sihay==0){                    

                      ?>
                    <img src="enviado1.png" style="width: 40px; height: 40px; position:absolute; margin-top: -18%; margin-left:23%;">
                    <?php } else{ while(@$row2=$buscarIntentos->fetch(PDO::FETCH_ASSOC)){
                        if(@$row2['idRegistro']!=null){ ?>
                      <img src="leido1.png" style="width: 40px; height: 40px; position:absolute; margin-top: -18%; margin-left:23%;">
                    <?php } } } ?>
                  </div>
                  <div id="state" class="grid_4 alpha" style="<?php echo $llamadaAccion; ?>">
                              <div class="gps_ring"></div>
                          </div>


                </div>                 
               </div>
             </a>
             <div class="col-md-1"></div>






            <?php  $i--;//semana 
          }  ?>
               
             </div><br><br>


         </div>
         


        

                  <style type="text/css">
                    .cajaCards{
                      box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                      transition: all 0.3s cubic-bezier(.25,.8,.25,1);
                      border-radius: 5px;
                      height: 100px; 
                      margin-bottom: 20px;
                      padding-top: 10px;
                    }

                    .cajaCards:hover{
                       box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
                       background: #642B73;  /* fallback for old browsers */
                      background: -webkit-linear-gradient(to right, #C6426E, #642B73);  /* Chrome 10-25, Safari 5.1-6 */
                      background: linear-gradient(to right, #C6426E, #642B73); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                      color: white;
                      font-size: bold;
                      padding-top: 10px;
                      cursor: pointer;

                    }

                    .cajaGrado{
                      box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
                       background: #642B73;  /* fallback for old browsers */
                      background: -webkit-linear-gradient(to right, #C6426E, #642B73);  /* Chrome 10-25, Safari 5.1-6 */
                      background: linear-gradient(to right, #C6426E, #642B73); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                      color: white;
                      font-size: bold;
                      padding-top: 5px;


                    }

                    .btnGrado{
                       box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                       transition: all 0.3s cubic-bezier(.25,.8,.25,1);
                       height:50px; padding-top: 20px; background-color:#2980b9;
                       margin-bottom: 20px;
                       border-radius: 10px;

                    }
                    .btnGrado:hover{
                      box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
                      cursor: pointer;
                    }


                    /* acordion css*/
  
                    .estiloProducto{
                     box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                     transition: all 0.3s cubic-bezier(.25,.8,.25,1);
                    }

                    .estiloProducto:hover{
                       box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
                    }


                  </style>


                    
                 
            


      
<script type="text/javascript">

        function ejecucion(){
          startArtyom();
          artyom.say("Hola Miss Yesy, buenos días, soy tu asistente, estoy para ayudarte, y me da mucho gusto que estés aquí, te dare algunas sugerencias didácticas y algunos tips, para apoyar a tus alumnos y explotar lo mejor de ellos.");
          document.getElementById("dormida").style.display="none";
          document.getElementById("despierta").style.display="block";
          
        }


        function metodologiaActiva(){
          startArtyom();
          artyom.say("Hola!! Te dare el concepto de Metodologia Activa, la cual usamos para la enseñanza aprendizaje en atomo(LMS), La enseñanza basada en metodologías activas es una enseñanza centrada en el estudiante, en su capacitación en competencias propias del saber de la disciplina. Estas estrategias conciben el aprendizaje como un proceso constructivo y no receptivo. La psicología cognitiva ha mostrado consistentemente, que una de las estructuras más importantes de la memoria es su estructura asociativa. El conocimiento está estructurado en redes de conceptos relacionados que se denominan redes semánticas. La nueva información se acopla a la red ya existente. Dependiendo de cómo se realice esta conexión la nueva información puede ser utilizada o no, para resolver problemas o reconocer situaciones (Glaser 1991). Esto implica la concepción del aprendizaje como proceso y no únicamente como una recepción y acumulación de información. ¿Quiero saber si aprendiste, responde si aprendí, o no aprendí, porfavor?");
          document.getElementById("despierta").style.display="none";
          document.getElementById("dormida").style.display="none";
          document.getElementById("saluda").style.display="block";         
 

        }

       
      artyom.addCommands([
      {
        indexes:['sí aprendi','no aprendi'],
        action: function(i){
          if (i==0) {
            artyom.say("Perfecto");
          }
          if (i==1) {
            artyom.say("te mostrare un video ahora.");
          }          
        }
      }]); 

     



   


</script>  
          
      </div>
<!--//CENTRANDO CONTENIDO ROL 1 -->

<!--LATERAL DERECHO CONTENIDO FIJO -->
		<?php include '../static/lat-derecho.php';  $nivelll=1; directoriosNivelesDer($nivelll);  ?>
 <!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->  

 
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="../js/jquery-3.2.1.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>